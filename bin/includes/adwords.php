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

function makeReplaceFunction(string $matchEntity, array $dictionary, $prefix = null): callable
{
    $prefix = $prefix ? $prefix : $matchEntity;

    return function (string $entity, string $property) use ($prefix, $matchEntity, $dictionary) {
        if ($entity !== $matchEntity) {
            return null;
        }

        foreach ($dictionary as $key => $value) {
            if (is_numeric($key)) {
                $original = $value;
                $replacement = substr($original, strlen($prefix));
            } else {
                $original = $key;
                $replacement = $value;
            }

            if ($original === $property) {
                return $replacement;
            }
        }

        return null;
    };
}

function makeAttributeIdGenerator(): callable
{
    $fns = [
        makeReplaceFunction('Account', [
            'ExternalCustomerId' => 'Id',
            'AccountCurrencyCode',
            'AccountDescriptiveName' => 'Name',
            'AccountTimeZone'
        ]),

        makeReplaceFunction('Ad', [
            'AdType'
        ]),

        makeReplaceFunction('AdGroup', [
            'AdGroupDesktopBidModifier',
            'AdGroupId',
            'AdGroupMobileBidModifier',
            'AdGroupName',
            'AdGroupStatus',
            'AdGroupTabletBidModifier',
            'AdGroupType'
        ]),

        makeReplaceFunction('Budget', [
            'BudgetId',
            'BudgetName',
            'BudgetReferenceCount',
            'BudgetStatus',
            'BudgetCampaignAssociationStatus'
        ]),

        makeReplaceFunction('Campaign', [
            'CampaignDesktopBidModifier',
            'CampaignGroupId',
            'CampaignId',
            'CampaignMobileBidModifier',
            'CampaignName',
            'CampaignStatus',
            'CampaignTabletBidModifier',
            'CampaignTrialType'
        ]),

        makeReplaceFunction('Keyword', [
            'KeywordMatchType'
        ]),

        makeReplaceFunction('Placement', [
            'CampaignId',
            'CampaignName',
            'CampaignStatus'
        ], 'Campaign'),

        makeReplaceFunction('Video', [
            'VideoChannelId',
            'VideoDuration',
            'VideoId',
            'VideoTitle'
        ]),

        makeReplaceFunction('Partition', [
            'PartitionType'
        ])
    ];

    $adGroupLevel = [
        'Product',
        'Search',
        'Audience',
        'Location',
        'Category',
        'Query'
    ];

    foreach ($adGroupLevel as $entity) {
        $fns[] = makeReplaceFunction($entity, [
            'AdGroupId',
            'AdGroupName',
            'AdGroupStatus'
        ], 'AdGroup');
    }

    return function (string $entity, string $attributeName) use ($fns): string {
        foreach ($fns as $match) {
            $translation = $match($entity, $attributeName);

            if ($translation) {
                return strtolower($translation);
            }
        }

        return strtolower($attributeName);
    };
}

function makeMetricExtensions(array $fields): callable
{
    $fixed = [
        'roas' => customRatioParser('ConversionValue', 'Cost'),
        'cpv100' => cpv100Adwords('Cost', 'VideoQuartile100Rate', 'VideoViews')
    ];

    $dynamic = [
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
    ];

    $build = function ($list) use ($fields): array {
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

    $map = array_merge($fixed, $build($dynamic));

    return function (string $metric) use ($map): array {
        return isset($map[$metric])
            ? $map[$metric]
            : [];
    };
}

function adWordsFieldsBlacklist(): callable
{
    $blacklist = [
        'ConvertedClicks',
        'CostPerConvertedClick',
        'ConvertedClicksSignificance',
        'CostPerConvertedClickSignificance',
        'ValuePerConvertedClick'
    ];

    return function (string $name) use ($blacklist) {
        return in_array($name, $blacklist);
    };
}

function extendFields(string $entity, $fields): array
{
    if ($entity === 'Keyword') {
        $fields['AverageQualityScore'] = $fields['QualityScore'];
    }

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

    return $fields;
}

function normalizeProperty(string $property): string
{
    switch ($property) {
        case 'AverageQualityScore':
            return 'QualityScore';
        default:
            return $property;
    }
}

function isAdWordsMetric(string $id, array $adWordsField): bool
{
    $actuallyIsAMetric = [
        'estimatedaddclicksatfirstpositioncpc',
        'estimatedaddcostatfirstpositioncpc',
        'cpmbid',
        'topofpagecpc',
        'firstpagecpc',
        'firstpositioncpc',
        'averagequalityscore'
    ];

    return (
        strtolower($adWordsField['Behavior']) === 'metric' ||
        in_array($id, $actuallyIsAMetric)
    );
}

function getAdWordsAttributeType(string $id, array $adWordsField): string
{
    $overrideType = [
        'averagecpv' => 'currency',
        'averagecpe' => 'currency',
        'averagecpm' => 'currency',
        'averagequalityscore' => 'decimal'
    ];

    $default = strtolower($adWordsField['Type']);

    if ($id === 'id') {
        return $default;
    }

    if (isset($overrideType[$id])) {
        return $overrideType[$id];
    }

    if ($adWordsField['SpecialValue']) {
        return 'special';
    }

    if ($adWordsField['Percentage']) {
        return 'percentage';
    }

    if ($adWordsField['Type'] === 'Money' || $adWordsField['Type'] === 'Bid') {
        return 'currency';
    }

    if ($adWordsField['Type'] === 'Long') {
        return 'integer';
    }

    if ($adWordsField['Type'] === 'Double') {
        return 'decimal';
    }

    return $default;
}

function getAdwordsConfig(): array
{
    $output = [
        'entities' => [],
        'metrics' => [],
        'reports' => [],
        'sources' => []
    ];

    $isBlacklisted = adWordsFieldsBlacklist();

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

    $entityNameMap = [
        'ACCOUNT_PERFORMANCE_REPORT' => 'Account',
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
        'KEYWORDLESS_QUERY_REPORT' => 'Query',
        'BID_GOAL_PERFORMANCE_REPORT' => 'Strategy',
        'PRODUCT_PARTITION_REPORT' => 'Partition',
        'SHOPPING_PERFORMANCE_REPORT' => 'Product'
    ];

    $createId = makeAttributeIdGenerator();

    foreach ($entityNameMap as $reportName => $entity) {
        $fields = extendFields($entity, ReportMap::get($reportName));

        $reportConfig = [
            'id' => $reportName,
            'attributes' => []
        ];

        $entity = $entityNameMap[$reportName];
        $output['entities'][$entity] = $entity;

        $metricExtensions = makeMetricExtensions($fields);

        foreach ($fields as $originalProperty => $adWordsField) {
            if ($isBlacklisted($originalProperty)) continue;

            $id = $createId($entity, $originalProperty);
            $property = normalizeProperty($originalProperty);
            $isMetric = isAdWordsMetric($id, $adWordsField);

            $attribute = [
                'id' => $id,
                'property' => $property,
                'raw_property' => $originalProperty,
                'is_filter' => $adWordsField['Filterable'],
                'type' => getAdWordsAttributeType($id, $adWordsField),
                'is_metric' => $isMetric,
                'is_dimension' => !$isMetric,
                'is_percentage' => $adWordsField['Percentage']
            ];

            if (isset($adWordsField['PredicateValues'])) {
                $attribute['values'] = $adWordsField['PredicateValues'];
            }

            if (isset($adWordsField['IncompatibleFields'])) {
                $attribute['incompatible'] = $adWordsField['IncompatibleFields'];
            }

            if (
                $attribute['is_dimension'] &&
                isset($dimensionParsers[$attribute['type']])
            ) {
                $attribute['parse'] = $dimensionParsers[$attribute['type']]($property);
            }

            if ($isMetric) {
                if (empty($output['metrics'][$id])) {
                    $metric = [
                        'id' => $id,
                        'type' => $attribute['type']
                    ];

                    if (!isset($metricParsers[$metric['type']])) {
                        $metric['type'] = 'raw';
                    }

                    $output['metrics'][$id] = $metric;
                } else {
                    $metric = $output['metrics'][$id];
                }

                $sourceConfig = array_merge([
                    'metric' => $id,
                    'entity' => $entity,
                    'platform' => 'adwords',
                    'report' => $reportName,
                    'fields' => [$property],
                    'parse' => $metricParsers[$metric['type']]($property)
                ], $metricExtensions($id));

                $canUseSimpleSum = $metric['type'] === 'integer' ||
                    $metric['type'] === 'decimal' ||
                    in_array($metric['id'], $simpleSumMetrics);

                if (isset($inferredMetricSumConfig[$id])) {
                    $sourceConfig = array_merge($sourceConfig, $inferredMetricSumConfig[$id]);
                } else if ($canUseSimpleSum) {
                    $sourceConfig['sum'] = simpleSum($metric['id']);
                }

                $output['sources'][] = $sourceConfig;
                $output['metrics'][$id] = $metric;
            } else if (isset($dimensionParsers[$attribute['type']])) {
                $attribute['parse'] = $dimensionParsers[$attribute['type']]($property);
            }

            if (isset($reportConfig['attributes'][$id])) {
                echo "would replace: {$id}\n";
            } else {
                $reportConfig['attributes'][$id] = $attribute;
            }
        }

        // post processing
        $attributes = $reportConfig['attributes'];

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
            $reportConfig['attributes'][$index] = $attr;
        }

        $output['reports'][$reportName] = $reportConfig;
    }

    $output['entities'] = array_values($output['entities']);

    return $output;
}
