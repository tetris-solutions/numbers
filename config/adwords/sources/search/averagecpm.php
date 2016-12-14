<?php
return [
    "metric" => "averagecpm",
    "entity" => "Search",
    "platform" => "adwords",
    "report" => "SEARCH_QUERY_PERFORMANCE_REPORT",
    "fields" => [
        "AverageCpm"
    ],
    "parse" => function ($data): float {
        return (float)str_replace(',', '', $data->AverageCpm);
    },
    "inferred_from" => [
        "cost",
        "impressions"
    ],
    "sum" => function (array $rows) {
        $sumDividend = 0;
        $sumDivisor = 0;
        foreach ($rows as $row) {
            $sumDividend += $row->cost;
            $sumDivisor += $row->impressions;
        }
        return (float)$sumDivisor !== 0.0
            ? $sumDividend / $sumDivisor
            : 0;
    }
];
