<?php
return [
    "metric" => "app_store_clicks",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "app_store_clicks"
    ],
    "parse" => function ($data) {
        return (float)$data->app_store_clicks;
    }
];
