<?php
return [
    "metric" => "deeplink_clicks",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "deeplink_clicks"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->deeplink_clicks);
    }
];
