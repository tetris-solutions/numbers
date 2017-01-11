<?php
return [
    "metric" => "allconversionrate",
    "entity" => "Audience",
    "platform" => "adwords",
    "report" => "AUDIENCE_PERFORMANCE_REPORT",
    "fields" => [
        "AllConversionRate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(['%', ','], '', $data->AllConversionRate)) / 100;
    },
    "inferred_from" => [
        "allconversions",
        "clicks"
    ],
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
