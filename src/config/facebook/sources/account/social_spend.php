<?php
return [
    "metric" => "social_spend",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "social_spend"
    ],
    "parse" => function ($data) {
        return (float)$data->social_spend;
    }
];
