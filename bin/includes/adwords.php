<?php
namespace Tetris\Numbers;

require __DIR__ . '/../../vendor/autoload.php';

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

    $percentSum = function (string $dividendMetric, string $divisorMetric): array {
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
    };

    $overrideType = [
        'averagecpv' => 'currency'
    ];

    $output = [
        'entities' => [],
        'metrics' => [],
        'reports' => [],
        'sources' => []
    ];

    $actuallyIsAMetric = [
        'estimatedaddclicksatfirstpositioncpc',
        'estimatedaddcostatfirstpositioncpc',
        'cpmbid',
        'topofpagecpc'
    ];

    $excludedFields = [
        'ConvertedClicks',
        'CostPerConvertedClick',
        'ConvertedClicksSignificance',
        'CostPerConvertedClickSignificance',
        'ValuePerConvertedClick'
    ];

    $inferredMetricSum = [
        'allconversionrate' => $percentSum('allconversions', 'clicks'),
        'averagecost' => $percentSum('cost', 'interactions'),
        'averagecpc' => $percentSum('cost', 'clicks'),
        'averagecpe' => $percentSum('cost', 'engagements'),
        'averagecpm' => $percentSum('cost', 'impressions'),
        'averagecpv' => $percentSum('cost', 'videoviews'),
        'averagefrequency' => $percentSum('impressions', 'impressionreach'),
        'averageposition' => altWeightedAverage('averageposition', 'impressions'),
        'conversionrate' => $percentSum('conversions', 'clicks'),
        'costperallconversion' => $percentSum('cost', 'allconversions'),
        'costperconversion' => $percentSum('cost', 'conversions'),
        'ctr' => $percentSum('clicks', 'impressions'),
        'engagementrate' => $percentSum('engagements', 'impressions'),
        'interactionrate' => $percentSum('interactions', 'impressions'),
        'invalidclickrate' => $percentSum('invalidclicks', 'clicks'),
        'offlineinteractionrate' => $percentSum('numofflineinteractions', 'numofflineimpressions'),
        'valueperallconversion' => $percentSum('allconversionvalue', 'allconversions'),
        'valueperconversion' => $percentSum('conversionvalue', 'conversions'),
        'videoviewrate' => $percentSum('videoviews', 'impressions'),
        'videoquartile25rate' => videoQuartileSum(25),
        'videoquartile50rate' => videoQuartileSum(50),
        'videoquartile75rate' => videoQuartileSum(75),
        'videoquartile100rate' => videoQuartileSum(100)
    ];

    $simpleSumMetrics = [
        'cost'
    ];

    $simpleSum = function (array $metric) {
        return function (string $indent) use ($metric): string {
            return join(PHP_EOL . $indent, [
                'function (array $rows): float {',
                '    return array_reduce(',
                '        $rows,',
                '        function (float $carry, $row): float {',
                "            return \$carry + \$row->{$metric['id']};",
                '        },',
                '        0.0',
                '    );',
                '}'
            ]);
        };
    };

    $metricParsers = [
        'percentage' => function ($property) {
            return function (string $indent) use ($property): string {
                return join(PHP_EOL . $indent, [
                    'function ($data): float {',
                    "    return floatval(str_replace(['%', ','], '', \$data->$property)) / 100;",
                    '}'
                ]);
            };
        },
        'decimal' => function ($property) {
            return function (string $indent) use ($property): string {
                return join(PHP_EOL . $indent, [
                    'function ($data): float {',
                    "    return (float)str_replace(',', '', \$data->$property);",
                    '}'
                ]);
            };
        },
        'integer' => function ($property) {
            return function (string $indent) use ($property): string {
                return join(PHP_EOL . $indent, [
                    'function ($data): int {',
                    "    return (int)str_replace(',', '', \$data->$property);",
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

    $metricParsers['currency'] = $metricParsers['decimal'];
    $dimensionParsers = [
        'integer' => $metricParsers['integer']
    ];

    $entityNameMap = [
        'BUDGET_PERFORMANCE_REPORT' => 'Budget',
        'ADGROUP_PERFORMANCE_REPORT' => 'AdGroup',
        'AD_PERFORMANCE_REPORT' => 'Ad',
        'CAMPAIGN_PERFORMANCE_REPORT' => 'Campaign',
        'KEYWORDS_PERFORMANCE_REPORT' => 'Keyword',
        'AUTOMATIC_PLACEMENTS_PERFORMANCE_REPORT' => 'Placement',
        'SEARCH_QUERY_PERFORMANCE_REPORT' => 'Search'
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

            $entityPrefix = $entity;

            if ($entity === 'Placement') {
                $entityPrefix = 'Campaign';
            } else if ($entity === 'Search') {
                $entityPrefix = 'AdGroup';
            }

            // name looks like <Campaign>FieldName
            $nameStartsWithEntity = strpos($originalAttributeName, $entityPrefix) === 0 &&
                !($entityPrefix === 'Ad' && (
                        strpos($originalAttributeName, 'AdGroup') === 0 ||
                        strpos($originalAttributeName, 'AdNetwork') === 0 ||
                        strpos($originalAttributeName, 'Advertiser') === 0 ||
                        strpos($originalAttributeName, 'Advertising') === 0));

            $attributeName = strtolower($originalAttributeName);

            if (empty($attributeName)) {
                throw new \Exception($originalAttributeName . ' === {' . $attributeName . '}');
            }

            if ($nameStartsWithEntity) {
                $attributeName = substr($attributeName, strlen($entityPrefix));
            }

            $isMetric = strtolower($field['Behavior']) === 'metric' ||
                in_array($attributeName, $actuallyIsAMetric);

            $attributeType = $field['Type'];

            if ($attributeName === 'id') {
                $attributeType = $field['Type'];
            } else if (isset($overrideType[$attributeName])) {
                $attributeType = $overrideType[$attributeName];
            } else if ($field['SpecialValue']) {
                $attributeType = 'raw';
            } else if ($field['Percentage']) {
                $attributeType = 'percentage';
            } else if ($field['Type'] === 'Money' || $field['Type'] === 'Bid') {
                $attributeType = 'currency';
            } else if ($field['Type'] === 'Long') {
                $attributeType = 'integer';
            } else if ($field['Type'] === 'Double') {
                $attributeType = 'decimal';
            }

            $attribute = [
                'id' => $attributeName,
                'property' => $originalAttributeName,
                'is_filter' => $field['Filterable'],
                'type' => strtolower($attributeType),
                'is_metric' => $isMetric,
                'is_dimension' => !$isMetric,
                'is_percentage' => $field['Percentage']
            ];

            if (
                $attribute['is_dimension'] &&
                isset($dimensionParsers[$attribute['type']])
            ) {
                $attribute['parse'] = $dimensionParsers[$attribute['type']]($originalAttributeName);
            }

            if ($isMetric) {
                if (empty($output['metrics'][$attributeName])) {
                    $metric = [
                        'id' => $attributeName,
                        'type' => $attributeType
                    ];

                    if (!isset($metricParsers[$metric['type']])) {
                        $metric['type'] = 'raw';
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
                    'parse' => $metricParsers[$metric['type']]($originalAttributeName)
                ];

                $canUseSimpleSum = $metric['type'] === 'integer' ||
                    $metric['type'] === 'decimal' ||
                    in_array($metric['id'], $simpleSumMetrics);

                if (isset($inferredMetricSum[$attributeName])) {
                    $sourceConfig = array_merge($sourceConfig, $inferredMetricSum[$attributeName]);
                } else if ($canUseSimpleSum) {
                    $sourceConfig['sum'] = $simpleSum($metric);
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
