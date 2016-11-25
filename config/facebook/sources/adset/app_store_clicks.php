<?php
return [
    "metric" => "app_store_clicks",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "app_store_clicks"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->app_store_clicks);
    }
];
