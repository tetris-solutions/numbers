<?php
namespace Tetris\Numbers;

require __DIR__ . '/../../vendor/autoload.php';

function percentSum(string $dividendMetric, string $divisorMetric): array
{
    return [
        "inferred_from" => [$dividendMetric, $divisorMetric],
        "sum" => function (string $indent) use ($dividendMetric, $divisorMetric): string {
            return join(PHP_EOL . $indent, [
                'function (array $rows) {',
                '    $sumDividend = 0;',
                '    $sumDivisor = 0;',
                '    foreach ($rows as $row) {',
                "        \$sumDividend += \$row->$dividendMetric;",
                "        \$sumDivisor += \$row->$divisorMetric;",
                '    }',
                '    return (float)$sumDivisor !== 0.0',
                '        ? $sumDividend / $sumDivisor',
                '        : 0;',
                '}'
            ]);
        }
    ];
}

function altWeightedAverage(string $metric, string $weight): array
{
    return [
        "inferred_from" => [$weight],
        "sum" => function (string $indent) use ($metric, $weight): string {
            return join(PHP_EOL . $indent, [
                'function (array $rows) {',
                '    $sumDividend = 0;',
                '    $sumDivisor = 0;',
                '    foreach ($rows as $row) {',
                "        \$sumDividend += \$row->$metric * \$row->$weight;",
                "        \$sumDivisor += \$row->$weight;",
                '    }',
                '    return (float)$sumDivisor !== 0.0',
                '        ? $sumDividend / $sumDivisor',
                '        : 0;',
                '}'
            ]);
        }
    ];
}

function videoQuartileSum(string $percent)
{
    return [
        "inferred_from" => ['videoviews'],
        "sum" => function (string $indent) use ($percent): string {
            return join(PHP_EOL . $indent, [
                'function (array $rows) {',
                '    $totalViews = 0;',
                '    $partialViews = 0;',
                '    foreach ($rows as $row) {',
                '        $totalViews += $row->videoviews;',
                "        \$partialViews += \$row->videoviews * \$row->videoquartile{$percent}rate;",
                '    }',
                '    return (float)$totalViews !== 0.0',
                '        ? $partialViews / $totalViews',
                '        : 0;',
                '}'
            ]);
        }
    ];
}

function getAdwordsConfig(): array
{
    $mappings = json_decode(file_get_contents(__DIR__ . '/../../vendor/tetris/adwords/src/Tetris/Adwords/report-mappings.json'), true);

    $overrideType = [
        'averagecpv' => 'currency'
    ];

    $output = [
        'entities' => [],
        'metrics' => [],
        'reports' => [],
        'sources' => []
    ];

    $excludedFields = [
        'ConvertedClicks',
        'CostPerConvertedClick',
        'ConvertedClicksSignificance',
        'CostPerConvertedClickSignificance',
        'ValuePerConvertedClick'
    ];

    $inferredMetricSum = [
        'allconversionrate' => percentSum('allconversions', 'clicks'),
        'averagecost' => percentSum('cost', 'interactions'),
        'averagecpc' => percentSum('cost', 'clicks'),
        'averagecpe' => percentSum('cost', 'engagements'),
        'averagecpm' => percentSum('cost', 'impressions'),
        'averagecpv' => percentSum('cost', 'videoviews'),
        'averagefrequency' => percentSum('impressions', 'impressionreach'),
        'averageposition' => altWeightedAverage('averageposition', 'impressions'),
        'conversionrate' => percentSum('conversions', 'clicks'),
        'costperallconversion' => percentSum('cost', 'allconversions'),
        'costperconversion' => percentSum('cost', 'conversions'),
        'ctr' => percentSum('clicks', 'impressions'),
        'engagementrate' => percentSum('engagements', 'impressions'),
        'interactionrate' => percentSum('interactions', 'impressions'),
        'invalidclickrate' => percentSum('invalidclicks', 'clicks'),
        'offlineinteractionrate' => percentSum('numofflineinteractions', 'numofflineimpressions'),
        'valueperallconversion' => percentSum('allconversionvalue', 'allconversions'),
        'valueperconversion' => percentSum('conversionvalue', 'conversions'),
        'videoviewrate' => percentSum('videoviews', 'impressions'),
        'videoquartile25rate' => videoQuartileSum(25),
        'videoquartile50rate' => videoQuartileSum(50),
        'videoquartile75rate' => videoQuartileSum(75),
        'videoquartile100rate' => videoQuartileSum(100)
    ];

    $simpleSumMetrics = [
        'cost'
    ];

    $getSourceAggregator = function (array $metric) {
        return function (string $indent) use ($metric): string {
            return join(PHP_EOL . $indent, [
                'function (array $rows): float {',
                '    return array_reduce(',
                '        $rows,',
                '        function (float $carry, \stdClass $row): float {',
                "            return \$carry + \$row->{$metric['id']};",
                '        },',
                '        0.0',
                '    );',
                '}'
            ]);
        };
    };

    $parsers = [
        'percentage' => function ($property) {
            return function (string $indent) use ($property): string {
                return join(PHP_EOL . $indent, [
                    'function ($data): float {',
                    "    return floatval(str_replace('%', '', \$data->$property)) / 100;",
                    '}'
                ]);
            };
        },
        'decimal' => function ($property) {
            return function (string $indent) use ($property): string {
                return join(PHP_EOL . $indent, [
                    'function ($data): float {',
                    "    return (float)\$data->$property;",
                    '}'
                ]);
            };
        },
        'integer' => function ($property) {
            return function (string $indent) use ($property): string {
                return join(PHP_EOL . $indent, [
                    'function ($data): int {',
                    "    return (int)\$data->$property;",
                    '}'
                ]);
            };

        },
        'raw' => function ($property) {
            return function (string $indent) use ($property): string {
                return join(PHP_EOL . $indent, [
                    'function ($data) {',
                    "    return \$data->$property;",
                    '}'
                ]);
            };
        }
    ];
    $parsers['currency'] = $parsers['decimal'];

    $entityNameMap = [
        'BUDGET_PERFORMANCE_REPORT' => 'Budget',
        'ACCOUNT_PERFORMANCE_REPORT' => 'Account',
        'ADGROUP_PERFORMANCE_REPORT' => 'AdGroup',
        'AD_PERFORMANCE_REPORT' => 'Ad',
        'CAMPAIGN_PERFORMANCE_REPORT' => 'Campaign',
        'KEYWORDS_PERFORMANCE_REPORT' => 'Keyword'
    ];

    foreach ($mappings as $reportName => $fields) {
        if (!isset($entityNameMap[$reportName])) continue;

        $output['reports'][$reportName] = [
            'id' => $reportName,
            'attributes' => []
        ];

        $entity = $entityNameMap[$reportName];
        $output['entities'][$entity] = $entity;

        foreach ($fields as $originalAttributeName => $field) {
            if (in_array($originalAttributeName, $excludedFields)) continue;

            // name looks like <Campaign>FieldName
            $nameStartsWithEntity = strpos($originalAttributeName, $entity) === 0 && !(
                    $entity === 'Ad' &&
                    strpos($originalAttributeName, 'AdGroup') === 0
                );

            $attributeName = strtolower($originalAttributeName);

            if (empty($attributeName)) {
                throw new \Exception($originalAttributeName . ' === {' . $attributeName . '}');
            }

            if ($nameStartsWithEntity) {
                $attributeName = substr($attributeName, strlen($entity));
            }

            $isMetric = strtolower($field['Behavior']) === 'metric';

            $attribute = [
                'id' => $attributeName,
                'property' => $originalAttributeName,
                'is_filter' => $field['Filterable'],
                'is_metric' => $isMetric,
                'is_dimension' => !$isMetric
            ];

            if ($isMetric) {
                if (empty($output['metrics'][$attributeName])) {
                    $metric = [
                        'id' => $attributeName,
                        'type' => 'decimal'
                    ];

                    if (isset($overrideType[$metric['id']])) {
                        $metric['type'] = $overrideType[$metric['id']];
                    } else if ($field['SpecialValue']) {
                        $metric['type'] = 'raw';
                    } else if ($field['Percentage']) {
                        $metric['type'] = 'percentage';
                    } else if ($field['Type'] === 'Money') {
                        $metric['type'] = 'currency';
                    } else if ($field['Type'] === 'Long') {
                        $metric['type'] = 'integer';
                    }

                    $output['metrics'][$attributeName] = $metric;
                } else {
                    $metric = $output['metrics'][$attributeName];
                }

                $sourceConfig = [
                    'metric' => $attributeName,
                    'entity' => $entity,
                    'platform' => 'adwords',
                    'report' => $reportName,
                    'fields' => [$originalAttributeName],
                    'parse' => $parsers[$metric['type']]($originalAttributeName)
                ];

                $canUseSimpleSum = $metric['type'] === 'integer' ||
                    $metric['type'] === 'decimal' ||
                    in_array($metric['id'], $simpleSumMetrics);

                if (isset($inferredMetricSum[$attributeName])) {
                    $sourceConfig = array_merge($sourceConfig, $inferredMetricSum[$attributeName]);
                } else if ($canUseSimpleSum) {
                    $sourceConfig['sum'] = $getSourceAggregator($metric);
                }

                $output['sources'][] = $sourceConfig;
                $output['metrics'][$attributeName] = $metric;
            }

            if (isset($output['reports'][$reportName]['attributes'][$attributeName])) {
                echo "replaced: {$attributeName}\n";
            }

            $output['reports'][$reportName]['attributes'][$attributeName] = $attribute;
        }
    }

    $output['entities'] = array_values($output['entities']);

    return $output;
}
