<?php
return [
    "metric" => "social_reach",
    "entity" => "Ad",
    "fields" => [
        "social_reach"
    ],
    "report" => "FB_AD",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'social_reach'}));
    }
];
