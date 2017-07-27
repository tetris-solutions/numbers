<?php

namespace Tetris\Numbers;

use Tetris\Numbers\Generator\Analytics\AnalyticsAttributeFactory;
use Tetris\Numbers\Generator\Analytics\AnalyticsMetricFactory;

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
    $fieldsConfig = json_decode(file_get_contents(__DIR__ . '/../../maps/analytics-fields.json'), true);

    $reportName = 'GA_DEFAULT';
    $entity = 'Campaign';

    $output = [
        'entities' => [$entity],
        'metrics' => [],
        'reports' => [
            $reportName => [
                'id' => $reportName,
                'attributes' => [
                    'platform' => platformAttribute('Analytics', $reportName)
                ]
            ]
        ],
        'sources' => []
    ];

    $fieldList = [
        'ga:adClicks',
        'ga:adContent',
        'ga:adCost',
        'ga:bounceRate',
        'ga:bounces',
        'ga:campaign',
        'ga:CPC',
        'ga:CTR',
        'ga:date',
        'ga:dayOfWeekName',
        'ga:deviceCategory',
        'ga:entrances',
        'ga:exits',
        'ga:goalCompletionsAll',
        'ga:goalConversionRateAll',
        'ga:goalStartsAll',
        'ga:hour',
        'ga:impressions',
        'ga:isoYearIsoWeek',
        'ga:itemQuantity',
        'ga:medium',
        'ga:month',
        'ga:newUsers',
        'ga:pagePath',
        'ga:pageValue',
        'ga:pageviews',
        'ga:pageviewsPerSession',
        'ga:percentNewSessions',
        'ga:region',
        'ga:ROAS',
        'ga:screenviews',
        'ga:sessionDuration',
        'ga:sessions',
        'ga:source',
        'ga:sourceMedium',
        'ga:timeOnPage',
        'ga:totalEvents',
        'ga:totalValue',
        'ga:transactions',
        'ga:transactionRevenue',
        'ga:uniqueEvents',
        'ga:uniquePageviews',
        'ga:users',
        'ga:year',
        'ga:yearMonth'
    ];

    for ($i = 1; $i <= 10; $i++) {
        $completions = "ga:goal{$i}Completions";
        $conversionRate = "ga:goal{$i}ConversionRate";
        $starts = "ga:goal{$i}Starts";

        $fieldsConfig[$completions] = $fieldsConfig["ga:goalCompletionsAll"];
        $fieldsConfig[$completions]['description'] =

        $fieldList[] = $completions;
        $fieldList[] = $conversionRate;
        $fieldList[] = $starts;
    }


    $attributeFactory = new AnalyticsAttributeFactory();
    $sourceFactory = new AnalyticsMetricFactory();

    foreach ($fieldList as $originalAttributeName) {
        $config = $fieldsConfig[$originalAttributeName];

        $attribute = $attributeFactory->create(
            $reportName,
            $entity,
            $originalAttributeName,
            $config['dataType'],
            false,
            $config['dataType'] === 'PERCENT',
            false,
            null,
            $config['type']
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
            $output['metrics'][$attribute->id] = $output['metrics'][$attribute->id] ??  [
                    'id' => $attribute->id,
                    'type' => $attribute->type
                ];
        }

        $output['reports'][$reportName]['attributes'][$attribute->id] = $attribute;
    }

    return $output;
}
