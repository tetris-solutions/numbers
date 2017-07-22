<?php
return [
    "metric" => "valueperallconversion",
    "entity" => "Product",
    "fields" => [
        "ValuePerAllConversion"
    ],
    "inferred_from" => [
        "allconversionvalue",
        "allconversions"
    ],
    "report" => "SHOPPING_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ValuePerAllConversion'}));
    },
    "sum" => function (array $rows) {
        $dividendMetric = 'allconversionvalue';
        $divisorMetric = 'allconversions';
    
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
