<?php
return [
    "metric" => "social_reach",
    "entity" => "AdSet",
    "fields" => [
        "social_reach"
    ],
    "report" => "FB_ADSET",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'social_reach'}));
    }
];
