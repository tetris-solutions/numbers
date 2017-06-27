<?php

namespace Tetris\Numbers;

use Tetris\Adwords\ReportMap;

require __DIR__ . '/../../vendor/autoload.php';

function impressionShareSum(string $metric)
{
    $source = makeParserFromSource('impression-share-sum');

    return [
        'inferred_from' => ['impressions'],
        'sum' => $source($metric, 'impressions')
    ];
}

function lostImpressionShareSum(string $metric, string $impressionShare)
{
    $source = makeParserFromSource('lost-impression-share-sum');

    return [
        'inferred_from' => [$impressionShare, 'impressions'],
        'sum' => $source($metric, $impressionShare, 'impressions')
    ];
}

function specialValueTriangulation(string $metric, array $auxMetrics)
{
    $source = makeParserFromSource('special-value-triangulation');

    return [
        'fields' => array_merge([$metric], $auxMetrics),
        'parse' => $source($metric, join(',', $auxMetrics))
    ];
}

function cpv100Adwords(string $cost, string $views100Percentile, string $views)
{
    $source = makeParserFromSource('cpv100-adwords');

    return [
        'fields' => [$cost, $views100Percentile, $views],
        'parse' => $source($cost, $views100Percentile, $views)
    ];
}

function cpv100AdwordsSum(string $cost, string $views100Percentile, string $views)
{
    $source = makeParserFromSource('cpv100-adwords-sum');

    return [
        'inferred_from' => [$cost, $views100Percentile, $views],
        'sum' => $source($cost, $views100Percentile, $views)
    ];
}

function getAdwordsConfig(): array
{
    $overrideType = [
        'averagecpv' => 'currency',
        'averagecpe' => 'currency',
        'averagecpm' => 'currency',
        'averagequalityscore' => 'decimal'
    ];

    $doNotShorten = [
        'VideoQuartile100Rate',
        'VideoQuartile75Rate',
        'VideoQuartile50Rate',
        'VideoQuartile25Rate',
        'VideoViews',
        'VideoViewRate'
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
        'topofpagecpc',
        'firstpagecpc',
        'firstpositioncpc',
        'averagequalityscore'
    ];

    $excludedFields = [
        'ConvertedClicks',
        'CostPerConvertedClick',
        'ConvertedClicksSignificance',
        'CostPerConvertedClickSignificance',
        'ValuePerConvertedClick'
    ];

    $inferredMetricSumConfig = [
        'searchbudgetlostimpressionshare' => lostImpressionShareSum('searchbudgetlostimpressionshare', 'searchimpressionshare'),
        'searchranklostimpressionshare' => lostImpressionShareSum('searchranklostimpressionshare', 'searchimpressionshare'),
        'searchimpressionshare' => impressionShareSum('searchimpressionshare'),

        'contentbudgetlostimpressionshare' => lostImpressionShareSum('contentbudgetlostimpressionshare', 'contentimpressionshare'),
        'contentranklostimpressionshare' => lostImpressionShareSum('contentranklostimpressionshare', 'contentimpressionshare'),
        'contentimpressionshare' => impressionShareSum('contentimpressionshare'),

        'allconversionrate' => customRatioSum('allconversions', 'clicks'),
        'averagecost' => customRatioSum('cost', 'interactions'),
        'averagecpc' => customRatioSum('cost', 'clicks'),
        'averagecpe' => customRatioSum('cost', 'engagements'),
        'averagecpm' => customRatioSum('cost', 'impressions'),
        'averagecpv' => customRatioSum('cost', 'videoviews'),
        'averagefrequency' => customRatioSum('impressions', 'impressionreach'),
        'conversionrate' => customRatioSum('conversions', 'clicks'),
        'costperallconversion' => customRatioSum('cost', 'allconversions'),
        'costperconversion' => customRatioSum('cost', 'conversions'),
        'ctr' => customRatioSum('clicks', 'impressions'),
        'engagementrate' => customRatioSum('engagements', 'impressions'),
        'interactionrate' => customRatioSum('interactions', 'impressions'),
        'invalidclickrate' => customRatioSum('invalidclicks', 'clicks'),
        'offlineinteractionrate' => customRatioSum('numofflineinteractions', 'numofflineimpressions'),
        'valueperallconversion' => customRatioSum('allconversionvalue', 'allconversions'),
        'valueperconversion' => customRatioSum('conversionvalue', 'conversions'),
        'videoviewrate' => customRatioSum('videoviews', 'impressions'),

        'videoquartile25rate' => videoQuartileSum(25),
        'videoquartile50rate' => videoQuartileSum(50),
        'videoquartile75rate' => videoQuartileSum(75),
        'videoquartile100rate' => videoQuartileSum(100),

        'averageposition' => weightedAverage('averageposition', 'impressions'),
        'averagequalityscore' => weightedAverage('averagequalityscore', 'impressions'),
        'roas' => customRatioSum('conversionvalue', 'cost'),
        'cpv100' => cpv100AdwordsSum('cost', 'videoquartile100rate', 'videoviews')
    ];

    $simpleSumMetrics = [
        'cost'
    ];

    $metricParsers = [
        'percentage' => makeParserFromSource('percent'),
        'decimal' => makeParserFromSource('decimal'),
        'integer' => makeParserFromSource('integer'),
        'raw' => makeParserFromSource('raw'),
        'special' => makeParserFromSource('special-value')
    ];

    $metricParsers['currency'] = $metricParsers['decimal'];

    $dimensionParsers = [
        'integer' => $metricParsers['integer'],
        'list' => makeParserFromSource('json')
    ];

    $specialMetricConfig = [
        'roas' => customRatioParser('ConversionValue', 'Cost'),
        'cpv100' => cpv100Adwords('Cost', 'VideoQuartile100Rate', 'VideoViews')
    ];

    $entityNameMap = [
        'BUDGET_PERFORMANCE_REPORT' => 'Budget',
        'ADGROUP_PERFORMANCE_REPORT' => 'AdGroup',
        'AD_PERFORMANCE_REPORT' => 'Ad',
        'CAMPAIGN_PERFORMANCE_REPORT' => 'Campaign',
        'KEYWORDS_PERFORMANCE_REPORT' => 'Keyword',
        'AUTOMATIC_PLACEMENTS_PERFORMANCE_REPORT' => 'Placement',
        'SEARCH_QUERY_PERFORMANCE_REPORT' => 'Search',
        'AUDIENCE_PERFORMANCE_REPORT' => 'Audience',
        'VIDEO_PERFORMANCE_REPORT' => 'Video',
        'GEO_PERFORMANCE_REPORT' => 'Location',
        'KEYWORDLESS_CATEGORY_REPORT' => 'Category',
        'KEYWORDLESS_QUERY_REPORT' => 'Query'
    ];

    $overrideOriginalName = [
        'AverageQualityScore' => 'QualityScore'
    ];

    $mappings = [];

    foreach ($entityNameMap as $reportName => $entityName) {
        $mappings[$reportName] = ReportMap::get($reportName);
    }

    $mappings['KEYWORDS_PERFORMANCE_REPORT']['AverageQualityScore'] =
        $mappings['KEYWORDS_PERFORMANCE_REPORT']['QualityScore'];

    foreach ($mappings as $reportName => $fields) {
        if (!isset($entityNameMap[$reportName])) continue;

        if (isset($fields['ConversionValue']) && isset($fields['Cost'])) {
            $fields['Roas'] = $fields['Cost'];
            $fields['Roas']['Filterable'] = false;
        }

        if (
            isset($fields['AverageCpc']) &&
            isset($fields['Cost']) &&
            isset($fields['VideoQuartile100Rate']) &&
            isset($fields['VideoViews'])
        ) {
            $fields['Cpv100'] = $fields['AverageCpc'];
            $fields['Cpv100']['Filterable'] = false;
        }

        $output['reports'][$reportName] = [
            'id' => $reportName,
            'attributes' => []
        ];

        $entity = $entityNameMap[$reportName];
        $output['entities'][$entity] = $entity;

        $buildSpecialMetrics = function ($list) use ($fields): array {
            $config = [];

            foreach ($list as $name => $parts) {
                if (!isset($fields[$name])) continue;

                $auxMetrics = [];

                foreach ($parts as $part) {
                    if (!isset($fields[$part])) continue;

                    $auxMetrics[] = $part;
                }

                $config[strtolower($name)] = specialValueTriangulation($name, $auxMetrics);
            }

            return $config;
        };

        $reportSpecialMetrics = array_merge($specialMetricConfig, $buildSpecialMetrics([
            'SearchImpressionShare' => [
                'SearchBudgetLostImpressionShare',
                'SearchRankLostImpressionShare'
            ],

            'SearchBudgetLostImpressionShare' => [
                'SearchRankLostImpressionShare',
                'SearchImpressionShare'
            ],

            'SearchRankLostImpressionShare' => [
                'SearchBudgetLostImpressionShare',
                'SearchImpressionShare'
            ],

            'ContentImpressionShare' => [
                'ContentBudgetLostImpressionShare',
                'ContentRankLostImpressionShare'
            ],

            'ContentBudgetLostImpressionShare' => [
                'ContentRankLostImpressionShare',
                'ContentImpressionShare'
            ],
            'ContentRankLostImpressionShare' => [
                'ContentBudgetLostImpressionShare',
                'ContentImpressionShare'
            ]
        ]));

        foreach ($fields as $originalAttributeName => $field) {
            if (in_array($originalAttributeName, $excludedFields)) continue;

            switch ($entity) {
                case 'Placement':
                    $entityPrefix = 'Campaign';
                    break;
                case 'Search':
                case 'Audience':
                case 'Location':
                case 'Category':
                case 'Query':
                    $entityPrefix = 'AdGroup';
                    break;
                default:
                    $entityPrefix = $entity;
                    break;
            }

            // name looks like <Campaign>FieldName
            $nameStartsWithEntity = strpos($originalAttributeName, $entityPrefix) === 0 &&
                !in_array($originalAttributeName, $doNotShorten) &&
                !($entityPrefix === 'Ad' && (
                        strpos($originalAttributeName, 'AdGroup') === 0 ||
                        strpos($originalAttributeName, 'AdNetwork') === 0 ||
                        strpos($originalAttributeName, 'Advertiser') === 0 ||
                        strpos($originalAttributeName, 'Advertising') === 0));

            $attributeName = strtolower($originalAttributeName);

            if (empty($attributeName)) {
                throw new \Exception($originalAttributeName . ' === {' . $attributeName . '}');
            }

            $rawAttributeName = $originalAttributeName;

            if (isset($overrideOriginalName[$originalAttributeName])) {
                $originalAttributeName = $overrideOriginalName[$originalAttributeName];
            }

            if ($nameStartsWithEntity) {
                $attributeName = substr($attributeName, strlen($entityPrefix));
            }

            $isMetric = strtolower($field['Behavior']) === 'metric' ||
                in_array($attributeName, $actuallyIsAMetric);

            $attributeType = strtolower($field['Type']);

            if ($attributeName !== 'id') {
                if (isset($overrideType[$attributeName])) {
                    $attributeType = $overrideType[$attributeName];
                } else if ($field['SpecialValue']) {
                    $attributeType = 'special';
                } else if ($field['Percentage']) {
                    $attributeType = 'percentage';
                } else if ($field['Type'] === 'Money' || $field['Type'] === 'Bid') {
                    $attributeType = 'currency';
                } else if ($field['Type'] === 'Long') {
                    $attributeType = 'integer';
                } else if ($field['Type'] === 'Double') {
                    $attributeType = 'decimal';
                }
            }


            $attribute = [
                'id' => $attributeName,
                'property' => $originalAttributeName,
                'raw_property' => $rawAttributeName,
                'is_filter' => $field['Filterable'],
                'type' => $attributeType,
                'is_metric' => $isMetric,
                'is_dimension' => !$isMetric,
                'is_percentage' => $field['Percentage']
            ];

            if (isset($field['PredicateValues'])) {
                $attribute['values'] = $field['PredicateValues'];
            }

            if (isset($field['IncompatibleFields'])) {
                $attribute['incompatible'] = $field['IncompatibleFields'];
            }

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

                if (isset($reportSpecialMetrics[$attributeName])) {
                    $sourceConfig = array_merge($sourceConfig, $reportSpecialMetrics[$attributeName]);
                }

                $canUseSimpleSum = $metric['type'] === 'integer' ||
                    $metric['type'] === 'decimal' ||
                    in_array($metric['id'], $simpleSumMetrics);

                if (isset($inferredMetricSumConfig[$attributeName])) {
                    $sourceConfig = array_merge($sourceConfig, $inferredMetricSumConfig[$attributeName]);
                } else if ($canUseSimpleSum) {
                    $sourceConfig['sum'] = simpleSum($metric['id']);
                }

                $output['sources'][] = $sourceConfig;
                $output['metrics'][$attributeName] = $metric;
            } else if (isset($dimensionParsers[$attribute['type']])) {
                $attribute['parse'] = $dimensionParsers[$attribute['type']]($originalAttributeName);
            }

            if (isset($output['reports'][$reportName]['attributes'][$attributeName])) {
                echo "would replace: {$attributeName}\n";
            } else {
                $output['reports'][$reportName]['attributes'][$attributeName] = $attribute;
            }
        }

        // post processing
        $attributes = $output['reports'][$reportName]['attributes'];

        foreach ($attributes as $index => $attr) {
            if (!empty($attr['incompatible'])) {
                $incompatibleFields = [];

                foreach ($attr['incompatible'] as $property) {
                    foreach ($attributes as $other) {
                        if ($other['raw_property'] === $property) {
                            $incompatibleFields[] = $other['id'];
                        }
                    }
                }

                $attr['incompatible'] = $incompatibleFields;
            }

            unset($attr['raw_property']);
            $output['reports'][$reportName]['attributes'][$index] = $attr;
        }
    }

    $output['entities'] = array_values($output['entities']);

    return $output;
}
