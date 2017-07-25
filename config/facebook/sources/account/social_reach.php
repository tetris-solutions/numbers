<?php
return [
    "metric" => "social_reach",
    "entity" => "Account",
    "fields" => [
        "social_reach"
    ],
    "report" => "FB_ACCOUNT",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'social_reach'}));
    }
];
