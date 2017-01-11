<?php
return [
    "metric" => "frequency",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "frequency"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'frequency'}));
    },
    "sum" => function (array $rows) {
        $dividendMetric = 'impressions';
        $divisorMetric = 'reach';
    
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
        "impressions",
        "reach"
    ]
];
