<?php

namespace Tetris\Numbers;

use Tetris\Adwords\ReportMap;
use Tetris\Numbers\Base\Parser\AdWordsCPV100Parser;
use Tetris\Numbers\Base\Parser\TriangulationParser;
use Tetris\Numbers\Base\Sum\CPV100Sum;
use Tetris\Numbers\Base\Sum\ImpressionShareSum;
use Tetris\Numbers\Base\Sum\LostImpressionShareSum;
use Tetris\Numbers\Generator\AdWords\AdWordsAttributeFactory;
use Tetris\Numbers\Generator\AdWords\AdWordsMetricFactory;
use Tetris\Numbers\Generator\Generator;
use Tetris\Numbers\Generator\Shared\TransientAttribute;

function impressionShareSum(string $metric)
{
    $source = makeParserFromSource('impression-share-sum');
    $impressions = 'impressions';

    return [
        'traits' => [
            'sum' => ImpressionShareSum::class
        ],
        'impressionsMetric' => $impressions,
        'inferred_from' => [$impressions],
        'sum' => $source($metric, $impressions)
    ];
}

function lostImpressionShareSum(string $metric, string $impressionShare)
{
    $source = makeParserFromSource('lost-impression-share-sum');

    return [
        'traits' => [
            'sum' => LostImpressionShareSum::class
        ],
        'impressionShareMetric' => $impressionShare,
        'impressionsMetric' => 'impressions',
        'inferred_from' => [$impressionShare, 'impressions'],
        'sum' => $source($metric, $impressionShare, 'impressions')
    ];
}

function specialValueTriangulation(string $metric, array $auxMetrics)
{
    $source = makeParserFromSource('special-value-triangulation');

    return [
        'traits' => [
            'parser' => TriangulationParser::class
        ],
        'auxiliaryMetrics' => $auxMetrics,
        'fields' => array_merge([$metric], $auxMetrics),
        'parse' => $source($metric, join(',', $auxMetrics))
    ];
}

function cpv100AdWords(string $cost, string $views100Percentile, string $views)
{
    $source = makeParserFromSource('cpv100-adwords');

    return [
        'traits' => [
            'parser' => AdWordsCPV100Parser::class
        ],
        'costProperty' => $cost,
        'views100PercentileProperty' => $views100Percentile,
        'viewsProperty' => $views,
        'fields' => [$cost, $views100Percentile, $views],
        'parse' => $source($cost, $views100Percentile, $views)
    ];
}

function cpv100AdwordsSum(string $cost, string $views100Percentile, string $views)
{
    $source = makeParserFromSource('cpv100-adwords-sum');

    return [
        'traits' => [
            'sum' => CPV100Sum::class
        ],
        'costMetric' => $cost,
        'views100PercentileMetric' => $views100Percentile,
        'viewsMetric' => $views,
        'inferred_from' => [$cost, $views100Percentile, $views],
        'sum' => $source($cost, $views100Percentile, $views)
    ];
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

function getAdwordsConfig(): array
{
    $output = [
        'entities' => [],
        'metrics' => [],
        'reports' => [],
        'sources' => []
    ];

    $isBlacklisted = adWordsFieldsBlacklist();

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

    $attributeFactory = new AdWordsAttributeFactory();

    foreach ($entityNameMap as $reportName => $entity) {
        $fields = extendFields($entity, ReportMap::get($reportName));

        $reportConfig = [
            'id' => $reportName,
            'attributes' => []
        ];

        $entity = $entityNameMap[$reportName];
        $output['entities'][$entity] = $entity;

        $sourceFactory = new AdwordsMetricFactory($fields);

        foreach ($fields as $originalProperty => $adWordsField) {
            if ($isBlacklisted($originalProperty)) continue;

            $attribute = $attributeFactory->create(
                $reportName,
                $entity,
                $originalProperty,
                $adWordsField['Type'],
                $adWordsField['Filterable'],
                $adWordsField['Percentage'],
                $adWordsField['SpecialValue'],
                null,
                $adWordsField['Behavior'],
                $adWordsField['PredicateValues'] ?? null,
                $adWordsField['IncompatibleFields'] ?? null
            );

            if ($attribute->is_metric) {
                $source = $sourceFactory->create(
                    $attribute->id,
                    $attribute->property,
                    $attribute->type,
                    $entity,
                    $reportName
                );

                Generator::add($source);

                $output['sources'][] = $source;
                $output['metrics'][$attribute->id] = $output['metrics'][$attribute->id] ?? [
                        'id' => $attribute->id,
                        'type' => $attribute->type
                    ];
            }

            $reportConfig['attributes'][$attribute->id] = $attribute;
        }

        // post processing
        $attributes = $reportConfig['attributes'];

        /**
         * @var TransientAttribute $attr
         */
        foreach ($attributes as $index => $attr) {
            if (!empty($attr->incompatible)) {
                $incompatibleFields = [];

                foreach ($attr->incompatible as $property) {
                    /**
                     * @var \Tetris\Numbers\Generator\Shared\TransientAttribute $other
                     */
                    foreach ($attributes as $other) {
                        if ($other->raw_property === $property) {
                            $incompatibleFields[] = $other->id;
                        }
                    }
                }

                $attr->incompatible = $incompatibleFields;
            }

            Generator::add($attr);

            $reportConfig['attributes'][$index] = $attr;
        }

        $output['reports'][$reportName] = $reportConfig;
    }

    $output['entities'] = array_values($output['entities']);

    return $output;
}
