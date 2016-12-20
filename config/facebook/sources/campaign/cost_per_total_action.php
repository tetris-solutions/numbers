<?php
return [
    "metric" => "cost_per_total_action",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "cost_per_total_action"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->{'cost_per_total_action'});
    },
    "sum" => function (array $rows) {
        $sumDividend = 0;
        $sumDivisor = 0;
        foreach ($rows as $row) {
            $sumDividend += $row->{'spend'};
            $sumDivisor += $row->{'total_actions'};
        }
        return (float)$sumDivisor !== 0.0
            ? $sumDividend / $sumDivisor
            : 0;
    },
    "inferred_from" => [
        "spend",
        "total_actions"
    ]
];
