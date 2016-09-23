<?php
return [
    "metric" => "averagecpv",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "AverageCpv"
    ],
    "parse" => function ($data): float {
        return (float)$data->AverageCpv;
    },
    "inferred_from" => [
        "cost",
        "videoviews"
    ],
    "sum" => function (array $rows) {
        $sumDividend = 0;
        $sumDivisor = 0;
        foreach ($rows as $row) {
            $sumDividend += $row->cost;
            $sumDivisor += $row->videoviews;
        }
        return $sumDivisor !== 0
            ? $sumDividend / $sumDivisor
            : 0;
    }
];
