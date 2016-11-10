<?php
return [
    "metric" => "unique_social_clicks",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "unique_social_clicks"
    ],
    "parse" => function ($data) {
        return (float)$data->unique_social_clicks;
    }
];
