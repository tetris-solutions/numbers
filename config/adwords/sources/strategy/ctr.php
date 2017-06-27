<?php
return [
    "metric" => "ctr",
    "entity" => "Strategy",
    "platform" => "adwords",
    "report" => "BID_GOAL_PERFORMANCE_REPORT",
    "fields" => [
        "Ctr"
    ],
    "parse" => function ($data): float {
        $valueAsNumericString = str_replace(['%', ','], '', $data->{'Ctr'});
    
        return floatval($valueAsNumericString) / 100;
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
