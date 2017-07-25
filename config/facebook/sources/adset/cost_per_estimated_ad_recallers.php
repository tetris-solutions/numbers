<?php
return [
    "metric" => "cost_per_estimated_ad_recallers",
    "entity" => "AdSet",
    "fields" => [
        "cost_per_estimated_ad_recallers"
    ],
    "inferred_from" => [
        "spend",
        "estimated_ad_recallers"
    ],
    "report" => "FB_ADSET",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'cost_per_estimated_ad_recallers'}));
    },
    "sum" => function (array $rows) {
        $dividendMetric = 'spend';
        $divisorMetric = 'estimated_ad_recallers';
    
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
