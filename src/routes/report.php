<?php

namespace Tetris\Numbers;

use Tetris\Numbers\API\TokenManager;
use Tetris\Numbers\Report\Query\Query;
use Tetris\Numbers\Report\ResultParser;
use Tetris\Numbers\Resolver\AdWordsResolver;
use Tetris\Numbers\Resolver\AnalyticsResolver;
use Tetris\Numbers\Resolver\FacebookResolver;
use Tetris\Numbers\Resolver\VtexResolver;
use Throwable;
use Slim\Http\Request;
use Slim\Http\Response;
use Tetris\Services\FlagsService;

global $app;

$app->post('/',
    secured('get-report', function (Request $request, Response $response, array $params) {
        /**
         * @var FlagsService $flags
         */
        $flags = $this->flags;
        $locale = $flags->getLocale();
        $classes = [
            'adwords' => AdWordsResolver::class,
            'facebook' => FacebookResolver::class,
            'analytics' => AnalyticsResolver::class,
            'vtex' => VtexResolver::class
        ];
        $body = $request->getParsedBody();

        $shouldAggregate = (
            !empty($body['filters']['id']) &&
            !in_array('id', $body['dimensions'])
        );

        $query = new Query($locale, $body);
        /**
         * @var TokenManager $tkm
         */
        $tkm = $this->tkm;
        $account = $tkm->getAccount($query->tetrisAccountId);
        $resolverClass = $classes[$query->platform];
        /**
         * @var AdWordsResolver|FacebookResolver|AnalyticsResolver $resolver
         */
        $resolver = new $resolverClass($query->tetrisAccountId, $account->token);

        $exceptions = [];

        try {
            $rows = $resolver->resolve($query, $shouldAggregate);
        } catch (Throwable $e) {
            $exceptions[] = parseReportException($locale, $query, $e);
            $rows = [];
        }

        foreach ($rows as $index => $row) {
            $rows[$index] = ResultParser::parse($row, $query);
        }

        $notAuxiliary = function (string $dimensionId) use ($query): bool {
            return !array_key_exists($dimensionId, $query->report->auxiliary);
        };

        if ($shouldAggregate) {
            $dimensionIds = array_filter(array_column($query->report->dimensions, 'id'), $notAuxiliary);

            $rows = ResultParser::aggregate(
                $rows,
                $dimensionIds,
                $query->report->metrics
            );
        }

        $rows = ResultParser::filter($rows, $query->report->filters);

        return $response->withJson([
            'exceptions' => $exceptions,
            'result' => $rows
        ]);
    }));
