<?php
return [
    "metric" => "newsfeed_clicks",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "newsfeed_clicks"
    ],
    "parse" => function ($data) {
        return (float)$data->newsfeed_clicks;
    }
];
