<?php
return [
    "metric" => "invalidclickrate",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "InvalidClickRate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(['%', ','], '', $data->InvalidClickRate)) / 100;
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
