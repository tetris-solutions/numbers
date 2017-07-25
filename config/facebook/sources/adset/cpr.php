<?php
return [
    "metric" => "cpr",
    "entity" => "AdSet",
    "fields" => [
        "spend",
        "reach"
    ],
    "inferred_from" => [
        "spend",
        "reach"
    ],
    "report" => "FB_ADSET",
    "platform" => "facebook",
    "parse" => function ($data) {
        $conv = floatval(str_replace(',', '', $data->{'spend'}));
        $cost = floatval(str_replace(',', '', $data->{'reach'}));
    
        return $cost === 0.0 ? 0.0 : $conv / $cost;
    },
    "sum" => function (array $rows) {
        $dividendMetric = 'spend';
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
    }
];
