<?php
return [
    "metric" => "conversionrate",
    "entity" => "Query",
    "platform" => "adwords",
    "report" => "KEYWORDLESS_QUERY_REPORT",
    "fields" => [
        "ConversionRate"
    ],
    "parse" => function ($data): float {
        $valueAsNumericString = str_replace(['%', ','], '', $data->{'ConversionRate'});
    
        return floatval($valueAsNumericString) / 100;
    },
    "inferred_from" => [
        "conversions",
        "clicks"
    ],
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
