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
        return (float)$data->social_spend;
    }
];
