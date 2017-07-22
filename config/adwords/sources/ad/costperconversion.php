<?php
return [
    "metric" => "costperconversion",
    "entity" => "Ad",
    "fields" => [
        "CostPerConversion"
    ],
    "inferred_from" => [
        "cost",
        "conversions"
    ],
    "report" => "AD_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'CostPerConversion'}));
    },
    "sum" => function (array $rows) {
        $dividendMetric = 'cost';
        $divisorMetric = 'conversions';
    
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
