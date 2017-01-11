<?php
return [
    "metric" => "ctr",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "Ctr"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(['%', ','], '', $data->Ctr)) / 100;
    },
    "inferred_from" => [
        "clicks",
        "impressions"
    ],
    "sum" => function (array $rows) {
        $dividendMetric = 'clicks';
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
