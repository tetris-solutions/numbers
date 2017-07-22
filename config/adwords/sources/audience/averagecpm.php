<?php
return [
    "metric" => "averagecpm",
    "entity" => "Audience",
    "fields" => [
        "AverageCpm"
    ],
    "inferred_from" => [
        "cost",
        "impressions"
    ],
    "report" => "AUDIENCE_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'AverageCpm'}));
    },
    "sum" => function (array $rows) {
        $dividendMetric = 'cost';
        $divisorMetric = 'impressions';
    
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
