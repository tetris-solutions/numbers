<?php
return [
    "metric" => "social_impressions",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "social_impressions"
    ],
    "parse" => function ($data) {
        return (float)$data->social_impressions;
    }
];
