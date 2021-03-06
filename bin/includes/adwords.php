<?php

namespace Tetris\Numbers;

use Tetris\Adwords\ReportMap;
use Tetris\Numbers\Generator\AdWords\AdWordsAttributeFactory;
use Tetris\Numbers\Generator\AdWords\AdWordsMetricFactory;
use Tetris\Numbers\Generator\Shared\TransientAttribute;

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
        $fields['Roas']['Type'] = 'Double';
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
            'attributes' => [
                'platform' => platformAttribute('AdWords', $reportName)
            ]
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
                $adWordsField['SpecialValue'] || $originalProperty === 'AverageQualityScore',
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
                     * @var TransientAttribute $other
                     */
                    foreach ($attributes as $other) {
                        if ($other->raw_property === $property) {
                            $incompatibleFields[] = $other->id;
                        }
                    }
                }

                $attr->incompatible = $incompatibleFields;
            }

            $reportConfig['attributes'][$index] = $attr;
        }

        $output['reports'][$reportName] = $reportConfig;
    }

    $output['entities'] = array_values($output['entities']);

    return $output;
}
