<?php
return [
    "metric" => "newsfeed_clicks",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "newsfeed_clicks"
    ],
    "parse" => function ($data) {
        return (float)$data->newsfeed_clicks;
    }
];
