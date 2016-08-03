<?php
return [
    "metric" => "app_store_clicks",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "app_store_clicks"
    ],
    "parse" => function ($data) {
        return (float)$data->app_store_clicks;
    }
];
