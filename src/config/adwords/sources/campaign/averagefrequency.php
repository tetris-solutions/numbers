<?php
return [
    "metric" => "averagefrequency",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "AverageFrequency"
    ],
    "parse" => function ($data): int {
        return (int)$data->AverageFrequency;
    },
    "inferred_from" => [
        "impressions",
        "impressionreach"
    ],
    "sum" => function (array $rows) {
        $sumDividend = 0;
        $sumDivisor = 0;
        foreach ($rows as $row) {
            $sumDividend += $row->impressions;
            $sumDivisor += $row->impressionreach;
        }
        return $sumDivisor !== 0
            ? $sumDividend / $sumDivisor
            : 0;
    }
];
