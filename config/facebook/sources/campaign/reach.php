<?php
return [
    "metric" => "reach",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "reach"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'reach'}));
    },
    "sum" => NULL
];
