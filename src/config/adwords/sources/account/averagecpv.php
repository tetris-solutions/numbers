<?php
return [
    "metric" => "averagecpv",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "AverageCpv"
    ],
    "parse" => function ($data): int {
        return (int)$data->AverageCpv;
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
