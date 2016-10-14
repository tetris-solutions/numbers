<?php
return [
    "metric" => "social_spend",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "social_spend"
    ],
    "parse" => function ($data) {
        return floatval($data->social_spend);
    }
];
