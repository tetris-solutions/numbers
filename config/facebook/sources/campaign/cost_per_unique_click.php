<?php
return [
    "metric" => "cost_per_unique_click",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "cost_per_unique_click"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'cost_per_unique_click'}));
    },
    "sum" => NULL
];
