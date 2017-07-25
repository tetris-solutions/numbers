<?php
return [
    "metric" => "reach",
    "entity" => "Campaign",
    "fields" => [
        "reach"
    ],
    "report" => "FB_CAMPAIGN",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'reach'}));
    }
];
