<?php
namespace Tetris\Numbers;

use Slim\Http\Request;
use Slim\Http\Response;
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
            'adwords' => AdwordsResolver::class,
            'facebook' => FacebookResolver::class
        ];
        $body = $request->getParsedBody();

        $group = new CrossPlatformReport();

        foreach ($body['accounts'] as $acc) {
            $group->addAccount($locale, $acc, $body);
        }

        $aggregateMode = (
            !empty($body['filters']['id']) &&
            count($body['filters']['id']) > 1 &&
            !in_array('id', $body['dimensions'])
        );

        $exceptions = [];
        $rows = [];
        /**
         * @var TKMApi $tkm
         */
        $tkm = $this->tkm;

        /**
         * @var XQuery $xQuery
         */
        foreach ($group->queries as $xQuery) {
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
                $rows[] = $group->obfuscate($xQuery, ResultParser::parse($row, $query));
            }
        }

        if ($aggregateMode) {
            $rows = ResultParser::aggregate(
                $rows,
                $group->getDimensions(),
                $group->getMetrics()
            );
        }

        $filtered = ResultParser::filter($rows, $group->filters());

        $clean = function ($o) use ($debugMode, $body) {
            $row = [];

            if ($debugMode) {
                $row['__source__'] = $o->__source__;
            }

            foreach (['dimensions', 'metrics'] as $attr) {
                foreach ($body[$attr] as $name) {
                    $row[$name] = isset($o->{$name})
                        ? $o->{$name}
                        : null;
                }
            }

            return $row;
        };

        return $response->withJson([
            'result' => array_map($clean, $filtered),
            'exceptions' => $exceptions
        ]);
    }));
