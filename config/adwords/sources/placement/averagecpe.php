<?php
return [
    "metric" => "averagecpe",
    "entity" => "Placement",
    "fields" => [
        "AverageCpe"
    ],
    "inferred_from" => [
        "cost",
        "engagements"
    ],
    "report" => "AUTOMATIC_PLACEMENTS_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'AverageCpe'}));
    },
    "sum" => function (array $rows) {
        $dividendMetric = 'cost';
        $divisorMetric = 'engagements';
    
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
