<?php
return [
    "metric" => "social_clicks",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "social_clicks"
    ],
    "parse" => function ($data) {
        return (float)$data->social_clicks;
    }
];
