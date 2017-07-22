<?php
return [
    "metric" => "allconversionrate",
    "entity" => "Product",
    "fields" => [
        "AllConversionRate"
    ],
    "inferred_from" => [
        "allconversions",
        "clicks"
    ],
    "report" => "SHOPPING_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        $valueAsNumericString = str_replace(['%', ','], '', $data->{'AllConversionRate'});
    
        return floatval($valueAsNumericString) / 100;
    },
    "sum" => function (array $rows) {
        $dividendMetric = 'allconversions';
        $divisorMetric = 'clicks';
    
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
