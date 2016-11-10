<?php
return [
    "metric" => "unique_impressions",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "unique_impressions"
    ],
    "parse" => function ($data) {
        return (float)$data->unique_impressions;
    }
];
