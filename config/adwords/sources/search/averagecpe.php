<?php
return [
    "metric" => "averagecpe",
    "entity" => "Search",
    "platform" => "adwords",
    "report" => "SEARCH_QUERY_PERFORMANCE_REPORT",
    "fields" => [
        "AverageCpe"
    ],
    "parse" => function ($data): float {
        return (float)str_replace(',', '', $data->AverageCpe);
    },
    "inferred_from" => [
        "cost",
        "engagements"
    ],
    "sum" => function (array $rows) {
        $sumDividend = 0;
        $sumDivisor = 0;
        foreach ($rows as $row) {
            $sumDividend += $row->cost;
            $sumDivisor += $row->engagements;
        }
        return (float)$sumDivisor !== 0.0
            ? $sumDividend / $sumDivisor
            : 0;
    }
];
