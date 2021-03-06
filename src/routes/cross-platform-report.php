<?php

namespace Tetris\Numbers;

use Slim\Http\Request;
use Slim\Http\Response;
use Tetris\Numbers\API\TokenManager;
use Tetris\Numbers\Report\CrossPlatform\CrossPlatformReport;
use Tetris\Numbers\Report\CrossPlatform\XQuery;
use Tetris\Numbers\Report\Query\Query;
use Tetris\Numbers\Report\ResultParser;
use Tetris\Numbers\Resolver\AdWordsResolver;
use Tetris\Numbers\Resolver\AnalyticsResolver;
use Tetris\Numbers\Resolver\FacebookResolver;
use Tetris\Numbers\Resolver\Resolver;
use Tetris\Services\FlagsService;
use Throwable;

global $app;


$app->post('/x',
    secured('get-cross-platform-report', function (Request $request, Response $response, array $params) {
        /**
         * @var FlagsService $flags
         */
        $flags = $this->flags;
        $locale = $flags->getLocale();
        $debugMode = $flags->isDebugMode();
        $classes = [
            'adwords' => AdWordsResolver::class,
            'facebook' => FacebookResolver::class,
            'analytics' => AnalyticsResolver::class
        ];
        $body = $request->getParsedBody();

        $crossPlatformReport = new CrossPlatformReport();

        foreach ($body['accounts'] as $acc) {
            $crossPlatformReport->addAccount($locale, $acc, $body);
        }

        $aggregateMode = (
            !empty($body['filters']['id']) &&
            !in_array('id', $body['dimensions'])
        );

        $exceptions = [];
        $rows = [];
        /**
         * @var TokenManager $tkm
         */
        $tkm = $this->tkm;

        /**
         * @var XQuery $xQuery
         */
        foreach ($crossPlatformReport->queries as $xQuery) {
            try {
                $query = $xQuery->toRegularQuery();
            } catch (Throwable $e) {
                if ($e->getCode() === Query::BAD_REQUEST_CODE) {
                    continue;
                } else {
                    throw $e;
                }
            }

            $account = $tkm->getAccount($query->tetrisAccountId);
            $resolverClass = $classes[$query->platform];

            if ($query->platform === 'analytics') {
                if ($crossPlatformReport->containsPlatform('facebook')) {
                    $query->report->untangleFacebook();
                }

                if ($crossPlatformReport->containsPlatform('adwords')) {
                    $query->report->untangleAdWords();
                }
            }

            /**
             * @var Resolver $resolver
             */
            $resolver = new $resolverClass($query->tetrisAccountId, $account->token);

            try {
                $partial = $resolver->resolve($query, $aggregateMode);
            } catch (Throwable $e) {
                $exceptions[] = parseReportException($locale, $query, $e);
                continue;
            }

            foreach ($partial as $index => $row) {
                $rows[] = $crossPlatformReport->obfuscate($xQuery, ResultParser::parse($row, $query));
            }
        }

        if ($aggregateMode) {
            $rows = ResultParser::aggregate(
                $rows,
                $crossPlatformReport->getDimensions(),
                $crossPlatformReport->getMetrics()
            );
        }

        $filtered = ResultParser::filter($rows, $crossPlatformReport->filters());

        $clean = function ($o) use ($debugMode, $body) {
            $row = [];

            if ($debugMode) {
                $row['__source__'] = $o->__source__;
            }

            foreach (['dimensions', 'metrics'] as $attr) {
                foreach ($body[$attr] as $name) {
                    $row[$name] = $o->{$name} ?? null;
                }
            }

            return $row;
        };

        return $response->withJson([
            'result' => array_map($clean, $filtered),
            'exceptions' => $exceptions
        ]);
    }));
