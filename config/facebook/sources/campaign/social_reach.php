<?php
return [
    "metric" => "social_reach",
    "entity" => "Campaign",
    "fields" => [
        "social_reach"
    ],
    "report" => "FB_CAMPAIGN",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'social_reach'}));
    }
];
