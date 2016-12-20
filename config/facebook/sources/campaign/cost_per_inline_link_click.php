<?php
return [
    "metric" => "cost_per_inline_link_click",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "cost_per_inline_link_click"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->{'cost_per_inline_link_click'});
    },
    "sum" => function (array $rows) {
        $sumDividend = 0;
        $sumDivisor = 0;
        foreach ($rows as $row) {
            $sumDividend += $row->{'spend'};
            $sumDivisor += $row->{'inline_link_click'};
        }
        return (float)$sumDivisor !== 0.0
            ? $sumDividend / $sumDivisor
            : 0;
    },
    "inferred_from" => [
        "spend",
        "inline_link_click"
    ]
];
