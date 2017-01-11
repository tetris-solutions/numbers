<?php
return [
    "metric" => "averagecpm",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "AverageCpm"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'AverageCpm'}));
    },
    "inferred_from" => [
        "cost",
        "impressions"
    ],
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
