<?php
return [
    "metric" => "unique_clicks",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "unique_clicks"
    ],
    "parse" => function ($data) {
        return (float)$data->unique_clicks;
    }
];
