<?php
return [
    "metric" => "cost_per_inline_post_engagement",
    "entity" => "Account",
    "fields" => [
        "cost_per_inline_post_engagement"
    ],
    "inferred_from" => [
        "spend",
        "inline_post_engagement"
    ],
    "report" => "FB_ACCOUNT",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'cost_per_inline_post_engagement'}));
    },
    "sum" => function (array $rows) {
        $dividendMetric = 'spend';
        $divisorMetric = 'inline_post_engagement';
    
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
