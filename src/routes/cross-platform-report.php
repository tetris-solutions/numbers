<?php
namespace Tetris\Numbers;

use Slim\Http\Request;
use Slim\Http\Response;
use Tetris\Services\FlagsService;
use Throwable;

global $app;


function hasPlatformPrefix(string $str, string $platform):bool
{
    return strpos($str, "{$platform}:") === 0;
}

function notPrefixed(string $str)
{
    return strpos($str, ':') === FALSE;
}

function removePrefix(string $str)
{
    return substr($str, strpos($str, ':') + 1);
}

function makeAccountReportConfig(string $accountId, array $acc, array $body): array
{
    $identity = function ($val) {
        return $val;
    };
    $platform = $acc['platform'];
    $account = [
        'id' => $accountId,
        'tetris_account' => $acc['tetris_account'],
        'ad_account' => $acc['ad_account'],
        'platform' => $acc['platform'],
        'entity' => $body['entity'],
        'filters' => ['id' => []],
        'from' => $body['from'],
        'to' => $body['to'],
        'dimensions' => [],
        'metrics' => [],
        'replace' => []
    ];

    $idTransform = function (string $id, array $accountReport) {
        return "{$accountReport['tetris_account']}:{$accountReport['ad_account']}:{$id}";
    };

    $ids = isset($body['filters']['id'])
        ? $body['filters']['id']
        : [];

    foreach ($ids as $id) {
        if (strpos($id, $accountId) === 0) {
            $entityId = substr($id, strlen("{$accountId}:"));

            $account['filters']['id'][] = $entityId;
        }
    }

    foreach ($body['dimensions'] as $dimension) {
        if (hasPlatformPrefix($dimension, $platform)) {
            $account['dimensions'][] = removePrefix($dimension);
            $account['replace'][removePrefix($dimension)] = [
                'id' => $dimension,
                'transform' => $identity
            ];
        } else if ($dimension === 'id') {
            $account['dimensions'][] = $dimension;
            $account['replace'][$dimension] = [
                'id' => $dimension,
                'transform' => $idTransform
            ];
        } else if (notPrefixed($dimension)) {
            $replacement = MetaData::getOriginalFor($dimension, $platform);

            $account['dimensions'][] = $replacement['id'];
            $account['replace'][$replacement['id']] = [
                'id' => $dimension,
                'transform' => $replacement['transform']
            ];
        }
    }

    foreach ($body['metrics'] as $metric) {
        if (hasPlatformPrefix($metric, $platform)) {
            $account['metrics'][] = removePrefix($metric);
            $account['replace'][removePrefix($metric)] = [
                'id' => $metric,
                'transform' => $identity
            ];
        } else if (notPrefixed($metric)) {
            $replacement = MetaData::getOriginalFor($metric, $platform);

            $account['metrics'][] = $replacement['id'];
            $account['replace'][$replacement['id']] = [
                'id' => $metric,
                'transform' => $replacement['transform']
            ];
        }
    }

    foreach ($body['filters'] as $filterName => $values) {
        if ($filterName === 'id') continue;

        if (hasPlatformPrefix($filterName, $platform)) {
            $account['filters'][removePrefix($filterName)] = $values;
        } else if (notPrefixed($filterName)) {
            $replacement = MetaData::getOriginalFor($filterName, $platform);

            $account['filters'][$replacement['id']] = $values;

            if (isset($account['replace'][$replacement['id']])) continue;

            $account['replace'][$replacement['id']] = [
                'id' => $filterName,
                'transform' => $replacement['transform']
            ];
        }
    }

    return $account;
}

$app->post('/x',
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

        $accounts = [];

        foreach ($body['accounts'] as $acc) {
            $id = $acc['tetris_account'] . ':' . $acc['ad_account'];

            if (empty($accounts[$id])) {
                $accounts[$id] = makeAccountReportConfig($id, $acc, $body);
            }
        }


        $shouldAggregate = (
            !empty($body['filters']['id']) &&
            count($body['filters']['id']) > 1 &&
            !in_array('id', $body['dimensions'])
        );

        $exceptions = [];
        $auxiliary = [];
        $rows = [];
        $dimensions = $body['dimensions'];
        $metrics = [];
        $filters = [];
        /**
         * @var TKMApi $tkm
         */
        $tkm = $this->tkm;

        foreach ($accounts as $accountReport) {
            $emptyReport = empty($accountReport['filters']['id']);

            if ($emptyReport) continue;

            try {
                $query = new Query($locale, $accountReport);
            } catch (Throwable $e) {
                if ($e->getCode() === Query::BAD_REQUEST_CODE) {
                    continue;
                } else {
                    throw $e;
                }
            }

            foreach ($query->report->auxiliary as $property) {
                $auxiliary[$property] = $property;
            }

            foreach ($query->report->metrics as $attributeId => $metric) {
                $replacement = $accountReport['replace'][$attributeId];

                /*
                $attributeId = 'spend';
                $replacement = [
                    'id' => 'cost',
                    'transform' => function () {}
                ];
                */

                $metrics[$replacement['id']] = $metric;
            }

            foreach ($query->report->filters as $filter) {
                $attributeId = $filter['id'];

                if ($attributeId === 'id') continue;

                $replacement = $accountReport['replace'][$attributeId];
                $filters[$replacement['id']] = $filter;
            }

            $account = $tkm->getAccount($query->tetrisAccountId);
            $resolverClass = $classes[$query->platform];

            /**
             * @var Resolver $resolver
             */
            $resolver = new $resolverClass($query->tetrisAccountId, $account->token);

            try {
                $partial = $resolver->resolve($query, $shouldAggregate);
            } catch (Throwable $e) {
                $exceptions[] = parseReportException($locale, $query, $e);
                continue;
            }

            foreach ($partial as $index => $row) {
                $row = ResultParser::parse($row, $query);

                foreach ($accountReport['replace'] as $name => $original) {
                    /**
                     * @var callable $transform
                     */
                    $transform = $original['transform'];

                    if (isset($row->{$name})) {
                        $row->{$original['id']} = $transform($row->{$name}, $accountReport);

                        if ($original['id'] !== $name) {
                            unset($row->{$name});
                        }
                    } else {
                        $row->{$original['id']} = null;
                    }
                }

                $rows[] = $row;
            }
        }

        $platforms = array_column($accounts, 'platform');

        $notAuxiliary = function (string $dimensionId) use ($auxiliary) : bool {
            return !array_key_exists($dimensionId, $auxiliary);
        };
        $dimensions = array_filter($dimensions, $notAuxiliary);

        if (in_array('adwords', $platforms) && $shouldAggregate) {
            $rows = ResultParser::aggregate($rows, $dimensions, $metrics);
        }

        $rows = ResultParser::filter($rows, $filters, $auxiliary);

        return $response->withJson([
            'result' => $rows,
            'exceptions' => $exceptions
        ]);
    }));
