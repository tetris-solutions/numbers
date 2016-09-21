<?php
return [
    "metric" => "averagecpc",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "AverageCpc"
    ],
    "parse" => function ($data): float {
        return (float)$data->AverageCpc;
    },
    "inferred_from" => [
        "cost",
        "clicks"
    ],
    "sum" => function (array $rows) {
        $sumDividend = 0;
        $sumDivisor = 0;
        foreach ($rows as $row) {
            $sumDividend += $row->cost;
            $sumDivisor += $row->clicks;
        }
        return $sumDivisor !== 0
            ? $sumDividend / $sumDivisor
            : 0;
    }
];
