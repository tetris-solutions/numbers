<?php

return [
    'analytics' => [
      'yearmonth' => 'month',
      'adcost' => 'cost',
      'adclicks' => 'clicks',
      'hour' => 'hourofday',
      'isoyearisoweek' => 'week'
    ],
    'facebook' => [
        'day_of_week' => 'dayofweek',
        'spend' => 'cost',
        'hourly_stats_aggregated_by_audience_time_zone' => ['hourofday', function ($val) {
            if (empty($val)) return null;

            $parts = explode(':', $val);

            return !empty($parts) && is_numeric($parts[0])
                ? (int)$parts[0]
                : null;
        }],
    ],
    'adwords' => [
        'averagecpc' => 'cpc',
        'averagecpm' => 'cpm'
    ]
];
