<?php
return [
    "metric" => "cost_per_inline_link_click",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "cost_per_inline_link_click"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'cost_per_inline_link_click'}));
    },
    "sum" => function (array $rows) {
        $dividendMetric = 'spend';
        $divisorMetric = 'inline_link_clicks';
    
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
        "inline_link_clicks"
    ]
];
