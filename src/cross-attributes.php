<?php

$hourlyFbConvert = ['hourofday', function ($val) {
    if (empty($val)) return null;

    $parts = explode(':', $val);

    return !empty($parts) && is_numeric($parts[0])
        ? (int)$parts[0]
        : null;
}];

return [
    'facebook' => [
        'spend' => 'cost',
        'hourly_stats_aggregated_by_advertiser_time_zone' => $hourlyFbConvert,
        'hourly_stats_aggregated_by_audience_time_zone' => $hourlyFbConvert,
    ],
    'adwords' => [],
    'common' => [
        'id' => ['id', function ($id, $platform) {
            return "{$platform}:{$id}";
        }],
        'date',

        // metrics
        'cost',
        'clicks',
        'ctr',
        'impressions'
    ]
];