<?php
namespace Tetris\Numbers;

use Slim\Http\Request;
use Slim\Http\Response;
use Tetris\Services\FlagsService;

global $app;

$app->post('/',
    secured(function (Request $request, Response $response, array $params) {
        /**
         * @var FlagsService $flags
         */
        $flags = $this->flags;
        $locale = $flags->getLocale();
        $classes = [
            'adwords' => AdwordsResolver::class,
            'facebook' => FacebookResolver::class
        ];
        $body = $request->getParsedBody();

        $shouldAggregate = (
            !empty($body['filters']['id']) &&
            count($body['filters']['id']) > 1 &&
            !in_array('id', $body['dimensions'])
        );

        $query = new Query($locale, $body);
        /**
         * @var TKMApi $tkm
         */
        $tkm = $this->tkm;
        $account = $tkm->getAccount($query->tetrisAccountId);
        $resolverClass = $classes[$query->platform];
        /**
         * @var AdwordsResolver|FacebookResolver $resolver
         */
        $resolver = new $resolverClass($query->tetrisAccountId, $account->token);
        $rows = $resolver->resolve($query, $shouldAggregate);

        foreach ($rows as $index => $row) {
            $rows[$index] = ResultParser::parse($row, $query->report);
        }

        if ($query->platform === 'adwords' && $shouldAggregate) {
            $rows = ResultParser::aggregate($rows, $query->report->dimensions, $query->report->metrics);
        }

        $rows = ResultParser::filter($rows, $query->report->filters);

        return $response->withJson($rows);
    }));
