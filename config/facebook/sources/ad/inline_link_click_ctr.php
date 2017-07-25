<?php
return [
    "metric" => "inline_link_click_ctr",
    "entity" => "Ad",
    "fields" => [
        "inline_link_click_ctr"
    ],
    "inferred_from" => [
        "inline_link_clicks",
        "impressions"
    ],
    "report" => "FB_AD",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'inline_link_click_ctr'}));
    },
    "sum" => function (array $rows) {
        $dividendMetric = 'inline_link_clicks';
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
    }
];
