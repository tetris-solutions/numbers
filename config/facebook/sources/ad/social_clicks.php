<?php
return [
    "metric" => "social_clicks",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "social_clicks"
    ],
    "parse" => function ($data) {
        return (float)$data->social_clicks;
    }
];
