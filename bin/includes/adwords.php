<?php
namespace Tetris\Numbers;

require __DIR__ . '/../../vendor/autoload.php';

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

    $inferredMetricSum = [
        'searchbudgetlostimpressionshare' => lostImpressionShareSum('searchbudgetlostimpressionshare', 'searchimpressionshare'),
        'searchranklostimpressionshare' => lostImpressionShareSum('searchranklostimpressionshare', 'searchimpressionshare'),
        'searchimpressionshare' => impressionShareSum('searchimpressionshare'),
        'allconversionrate' => percentSum('allconversions', 'clicks'),
        'averagecost' => percentSum('cost', 'interactions'),
        'averagecpc' => percentSum('cost', 'clicks'),
        'averagecpe' => percentSum('cost', 'engagements'),
        'averagecpm' => percentSum('cost', 'impressions'),
        'averagecpv' => percentSum('cost', 'videoviews'),
        'averagefrequency' => percentSum('impressions', 'impressionreach'),
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
        'videoquartile100rate' => videoQuartileSum(100),

        'averageposition' => weightedAverage('averageposition', 'impressions'),
        'averagequalityscore' => weightedAverage('averagequalityscore', 'impressions'),
    ];

    $simpleSumMetrics = [
        'cost'
    ];

    $metricParsers = [
        'percentage' => makeParserFromSource('percent'),
        'decimal' => makeParserFromSource('decimal'),
        'integer' => makeParserFromSource('integer'),
        'raw' => makeParserFromSource('raw'),
        'special' => makeParserFromSource('adwords-special-value')
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
        'SEARCH_QUERY_PERFORMANCE_REPORT' => 'Search',
        'AUDIENCE_PERFORMANCE_REPORT' => 'Audience'
    ];

    $overrideOriginalName = [
        'AverageQualityScore' => 'QualityScore'
    ];

    $mappings['KEYWORDS_PERFORMANCE_REPORT']['AverageQualityScore'] =
        $mappings['KEYWORDS_PERFORMANCE_REPORT']['QualityScore'];

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
            } else if ($entity === 'Search' || $entity === 'Audience') {
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
                'is_filter' => $field['Filterable'],
                'type' => $attributeType,
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
                    $sourceConfig['sum'] = simpleSum($metric['id']);
                }

                $output['sources'][] = $sourceConfig;
                $output['metrics'][$attributeName] = $metric;
            }

            if (isset($output['reports'][$reportName]['attributes'][$attributeName])) {
                echo "would replace: {$attributeName}\n";
            } else {
                $output['reports'][$reportName]['attributes'][$attributeName] = $attribute;
            }
        }
    }

    $output['entities'] = array_values($output['entities']);

    return $output;
}
