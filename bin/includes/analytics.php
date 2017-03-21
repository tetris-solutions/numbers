<?php

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

    $types = ['STRING', 'INTEGER', 'FLOAT', 'PERCENT', 'TIME', 'CURRENCY'];
    $output = [
        'entities' => ['Campaign'],
        'metrics' => [],
        'reports' => ['GA_DEFAULT' => ['id' => 'GA_DEFAULT', 'attributes' => []]],
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
        'ga:sessionDuration',
        'ga:goalCompletionsAll',
        'ga:goalConversionRateAll',
        'ga:goalStartsAll',
        'ga:pageviews',
        'ga:pageviewsPerSession',
        'ga:timeOnPage',
        'ga:totalEvents',
        'ga:uniqueEvents'
    ];

//    foreach (['Completions', 'ConversionRate', 'Starts'] as $subGoal) {
//        for ($i = 1; $i <= 10; $i++) {
//            $fieldList[] = ["ga:goal{$i}{$subGoal}"];
//        }
//    }

    $fieldsConfig = json_decode(file_get_contents(__DIR__ . '/../../maps/analytics-fields.json'), true);

    foreach ($fieldList as $originalAttributeName) {
        $config = $fieldsConfig[$originalAttributeName];

        $attributeName = strtolower(substr($originalAttributeName, 3));
        $isMetric = $config['group'] !== 'Dimensions';

        $attribute = [
            'id' => $attributeName,
            'property' => $originalAttributeName,
            'type' => normalizeGAType($config['type']),
            'is_metric' => $isMetric,
            'is_dimension' => !$isMetric,
            'is_filter' => false
        ];

        if ($isMetric) {
            if (empty($output['metrics'][$attributeName])) {
                $output['metrics'][$attributeName] = [
                    'id' => $attributeName,
                    'type' => $attribute['type']
                ];
            }

            $source = [
                'metric' => $attributeName,
                'entity' => 'Campaign',
                'platform' => 'analytics',
                'report' => 'GA_DEFAULT',
                'fields' => [$originalAttributeName],
                'parse' => null,
                'sum' => null
            ];

            $output['sources'][] = $source;
        }

        $output['reports']['GA_DEFAULT']['attributes'][$attributeName] = $attribute;
    }

    return $output;
}