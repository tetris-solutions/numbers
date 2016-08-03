<?php
return [
    "metric" => "unique_social_impressions",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "unique_social_impressions"
    ],
    "parse" => function ($data) {
        return (float)$data->unique_social_impressions;
    }
];
