<?php
return [
    "metric" => "averagecost",
    "entity" => "Placement",
    "platform" => "adwords",
    "report" => "AUTOMATIC_PLACEMENTS_PERFORMANCE_REPORT",
    "fields" => [
        "AverageCost"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'AverageCost'}));
    },
    "inferred_from" => [
        "cost",
        "interactions"
    ],
    "sum" => function (array $rows) {
        $dividendMetric = 'cost';
        $divisorMetric = 'interactions';
    
        $sumDividend = 0;
        $sumDivisor = 0;
    
        foreach ($rows as $row) {
            $sumDividend += $row->{$dividendMetric};
            $sumDivisor += $row->{$divisorMetric};
        }
    
        return (float)$sumDivisor !== 0.0
            ? $sumDividend / $sumDivisor
            : 0;
    }
];
