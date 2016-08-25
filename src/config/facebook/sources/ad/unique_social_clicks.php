<?php
return [
    "metric" => "unique_social_clicks",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "unique_social_clicks"
    ],
    "parse" => function ($data) {
        return (float)$data->unique_social_clicks;
    }
];
