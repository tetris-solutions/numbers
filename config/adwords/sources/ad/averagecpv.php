<?php
return [
    "metric" => "averagecpv",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "AverageCpv"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'AverageCpv'}));
    },
    "inferred_from" => [
        "cost",
        "videoviews"
    ],
    "sum" => function (array $rows) {
        $dividendMetric = 'cost';
        $divisorMetric = 'videoviews';
    
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
