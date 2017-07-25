<?php
return [
    "metric" => "cost_per_unique_click",
    "entity" => "Campaign",
    "fields" => [
        "cost_per_unique_click"
    ],
    "report" => "FB_CAMPAIGN",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'cost_per_unique_click'}));
    }
];
