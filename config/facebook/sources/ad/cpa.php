<?php
return [
    "metric" => "cpa",
    "entity" => "Ad",
    "fields" => [
        "total_actions",
        "total_action_value"
    ],
    "inferred_from" => [
        "total_actions",
        "total_action_value"
    ],
    "report" => "FB_AD",
    "platform" => "facebook",
    "parse" => function ($data) {
        $conv = floatval(str_replace(',', '', $data->{'total_actions'}));
        $cost = floatval(str_replace(',', '', $data->{'total_action_value'}));
    
        return $cost === 0.0 ? 0.0 : $conv / $cost;
    },
    "sum" => function (array $rows) {
        $dividendMetric = 'total_actions';
        $divisorMetric = 'total_action_value';
    
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
