<?php
return [
    "metric" => "cpm",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "cpm"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'cpm'}));
    },
    "sum" => function (array $rows) {
        $dividendMetric = 'spend';
        $divisorMetric = 'impressions';
    
        $sumDividend = 0;
        $sumDivisor = 0;
    
        foreach ($rows as $row) {
            $sumDividend += $row->{$dividendMetric};
            $sumDivisor += $row->{$divisorMetric};
        }
    
        return (float)$sumDivisor !== 0.0
            ? $sumDividend / $sumDivisor
            : 0;
    },
    "inferred_from" => [
        "spend",
        "impressions"
    ]
];
