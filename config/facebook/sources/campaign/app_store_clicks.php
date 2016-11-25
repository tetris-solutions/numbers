<?php
return [
    "metric" => "app_store_clicks",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "app_store_clicks"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->app_store_clicks);
    }
];
