<?php
return [
    "metric" => "valueperconversion",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "ValuePerConversion"
    ],
    "parse" => function ($data): float {
        return (float)str_replace(',', '', $data->ValuePerConversion);
    },
    "inferred_from" => [
        "conversionvalue",
        "conversions"
    ],
    "sum" => function (array $rows) {
        $dividendMetric = 'conversionvalue';
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
