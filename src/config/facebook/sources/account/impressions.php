<?php
return [
    "metric" => "impressions",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "impressions"
    ],
    "parse" => function ($data) {
        return (float)$data->impressions;
    }
];
