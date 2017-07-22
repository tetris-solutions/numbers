<?php
return [
    "metric" => "ctr",
    "entity" => "Product",
    "fields" => [
        "Ctr"
    ],
    "inferred_from" => [
        "clicks",
        "impressions"
    ],
    "report" => "SHOPPING_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        $valueAsNumericString = str_replace(['%', ','], '', $data->{'Ctr'});
    
        return floatval($valueAsNumericString) / 100;
    },
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
