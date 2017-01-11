<?php
return [
    "metric" => "averagecpe",
    "entity" => "Audience",
    "platform" => "adwords",
    "report" => "AUDIENCE_PERFORMANCE_REPORT",
    "fields" => [
        "AverageCpe"
    ],
    "parse" => function ($data): int {
        return (int)str_replace(',', '', $data->{'AverageCpe'});
    },
    "inferred_from" => [
        "cost",
        "engagements"
    ],
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
