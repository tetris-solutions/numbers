<?php
return [
    "metric" => "newsfeed_clicks",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "newsfeed_clicks"
    ],
    "parse" => function ($data) {
        return (float)$data->newsfeed_clicks;
    }
];
