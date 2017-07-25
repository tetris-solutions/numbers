<?php

namespace Tetris\Numbers;

use Tetris\Numbers\Generator\Analytics\AnalyticsAttributeFactory;
use Tetris\Numbers\Generator\Analytics\AnalyticsMetricFactory;
use Tetris\Numbers\Generator\Generator;

function normalizeGAType(string $type): string
{
    $type = strtolower($type);

    switch ($type) {
        case 'integer':
        case 'float':
            return 'decimal';
        case 'percent':
            return 'percentage';
        default:
            return $type;
    }
}

function getAnalyticsConfig(): array
{
    $reportName = 'GA_DEFAULT';
    $entity = 'Campaign';

    $output = [
        'entities' => [$entity],
        'metrics' => [],
        'reports' => [$reportName => ['id' => $reportName, 'attributes' => []]],
        'sources' => []
    ];

    $fieldList = [
        'ga:date',
        'ga:campaign',
        'ga:source',
        'ga:medium',
        'ga:deviceCategory',
        'ga:adContent',
        'ga:region',
        'ga:newUsers',
        'ga:users',
        'ga:percentNewSessions',
        'ga:sessions',
        'ga:bounces',
        'ga:bounceRate',
        'ga:sessionDuration',
        'ga:goalCompletionsAll',
        'ga:goalConversionRateAll',
        'ga:goalStartsAll',
        'ga:pageviews',
        'ga:pageviewsPerSession',
        'ga:timeOnPage',
        'ga:totalEvents',
        'ga:uniqueEvents',
        'ga:ROAS',
        'ga:CTR',
        'ga:CPC',
        'ga:impressions',
        'ga:adClicks',
        'ga:adCost',
        'ga:yearMonth',
        'ga:hour',
        'ga:year',
        'ga:isoYearIsoWeek',
        'ga:dayOfWeekName',
        'ga:month'
    ];

    $fieldsConfig = json_decode(file_get_contents(__DIR__ . '/../../maps/analytics-fields.json'), true);

    $attributeFactory = new AnalyticsAttributeFactory();
    $sourceFactory = new AnalyticsMetricFactory();

    foreach ($fieldList as $originalAttributeName) {
        $config = $fieldsConfig[$originalAttributeName];

        $attribute = $attributeFactory->create(
            $reportName,
            $entity,
            $originalAttributeName,
            $config['type'],
            false,
            $config['type'] === 'PERCENT',
            false,
            null,
            $config['group']
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
            $output['metrics'][$attribute->id] = $output['metrics'][$attribute->id] ??  [
                    'id' => $attribute->id,
                    'type' => $attribute->type
                ];
        }

        Generator::add($attribute);

        $output['reports']['GA_DEFAULT']['attributes'][$attribute->id] = $attribute;
    }

    return $output;
}
