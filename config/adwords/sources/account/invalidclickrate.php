<?php
return [
    "metric" => "invalidclickrate",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "InvalidClickRate"
    ],
    "parse" => function ($data): float {
        $valueAsNumericString = str_replace(['%', ','], '', $data->{'InvalidClickRate'});
    
        return floatval($valueAsNumericString) / 100;
    },
    "inferred_from" => [
        "invalidclicks",
        "clicks"
    ],
    "sum" => function (array $rows) {
        $dividendMetric = 'invalidclicks';
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
