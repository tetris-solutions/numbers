<?php
return [
    "metric" => "roas",
    "entity" => "Account",
    "fields" => [
        "ConversionValue",
        "Cost"
    ],
    "inferred_from" => [
        "conversionvalue",
        "cost"
    ],
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data) {
        $conv = floatval(str_replace(',', '', $data->{'ConversionValue'}));
        $cost = floatval(str_replace(',', '', $data->{'Cost'}));
    
        return $cost === 0.0 ? 0.0 : $conv / $cost;
    },
    "sum" => function (array $rows) {
        $dividendMetric = 'conversionvalue';
        $divisorMetric = 'cost';
    
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
