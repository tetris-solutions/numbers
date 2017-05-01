<?php

namespace Tetris\Numbers;

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
    $parsersPerType = [
        'STRING' => makeParserFromSource('raw'),
        'INTEGER' => makeParserFromSource('integer'),
        'FLOAT' => makeParserFromSource('decimal'),
        'PERCENT' => makeParserFromSource('percent'),
        'TIME' => makeParserFromSource('raw'),
        'CURRENCY' => makeParserFromSource('decimal')
    ];

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

    $overrideName = ['campaign' => 'id', 'month' => 'monthofyear'];

    $dimensionParsers = [
      'date' => makeParserFromSource('ga-date'),
      'yearmonth' => makeParserFromSource('ga-month'),
      'isoyearisoweek' => makeParserFromSource('ga-week'),
      'monthofyear' => makeParserFromSource('ga-month-of-year')
    ];

    $fieldsConfig = json_decode(file_get_contents(__DIR__ . '/../../maps/analytics-fields.json'), true);

    foreach ($fieldList as $originalAttributeName) {
        $config = $fieldsConfig[$originalAttributeName];

        $attributeName = strtolower(substr($originalAttributeName, 3));
        $isMetric = $config['group'] !== 'Dimensions';

        if (isset($overrideName[$attributeName])) {
            $attributeName = $overrideName[$attributeName];
        }

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
                'parse' => $parsersPerType[$config['type']]($originalAttributeName),
                'sum' => null
            ];

            $output['sources'][] = $source;
        } else if (isset($dimensionParsers[$attributeName])) {
          $attribute['parse'] = $dimensionParsers[$attributeName]($originalAttributeName);
        }

        $output['reports']['GA_DEFAULT']['attributes'][$attributeName] = $attribute;
    }

    return $output;
}
