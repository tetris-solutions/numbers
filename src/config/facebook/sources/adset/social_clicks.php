<?php
return [
    "metric" => "social_clicks",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "social_clicks"
    ],
    "parse" => function ($data) {
        return (float)$data->social_clicks;
    }
];
