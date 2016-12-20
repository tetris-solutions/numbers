<?php
return [
    "metric" => "inline_link_click_ctr",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "inline_link_click_ctr"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->{'inline_link_click_ctr'});
    },
    "sum" => function (array $rows) {
        $sumDividend = 0;
        $sumDivisor = 0;
        foreach ($rows as $row) {
            $sumDividend += $row->{'inline_link_clicks'};
            $sumDivisor += $row->{'impressions'};
        }
        return (float)$sumDivisor !== 0.0
            ? $sumDividend / $sumDivisor
            : 0;
    },
    "inferred_from" => [
        "inline_link_clicks",
        "impressions"
    ]
];
