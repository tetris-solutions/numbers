<?php
return [
    "metric" => "roas",
    "entity" => "Account",
    "fields" => [
        "total_action_value",
        "spend"
    ],
    "inferred_from" => [
        "total_action_value",
        "spend"
    ],
    "report" => "FB_ACCOUNT",
    "platform" => "facebook",
    "parse" => function ($data) {
        $conv = floatval(str_replace(',', '', $data->{'total_action_value'}));
        $cost = floatval(str_replace(',', '', $data->{'spend'}));
    
        return $cost === 0.0 ? 0.0 : $conv / $cost;
    },
    "sum" => function (array $rows) {
        $dividendMetric = 'total_action_value';
        $divisorMetric = 'spend';
    
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
