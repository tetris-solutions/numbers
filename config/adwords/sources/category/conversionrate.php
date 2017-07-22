<?php
return [
    "metric" => "conversionrate",
    "entity" => "Category",
    "fields" => [
        "ConversionRate"
    ],
    "inferred_from" => [
        "conversions",
        "clicks"
    ],
    "report" => "KEYWORDLESS_CATEGORY_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        $valueAsNumericString = str_replace(['%', ','], '', $data->{'ConversionRate'});
    
        return floatval($valueAsNumericString) / 100;
    },
    "sum" => function (array $rows) {
        $dividendMetric = 'conversions';
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
