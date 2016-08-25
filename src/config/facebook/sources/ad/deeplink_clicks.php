<?php
return [
    "metric" => "deeplink_clicks",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "deeplink_clicks"
    ],
    "parse" => function ($data) {
        return (float)$data->deeplink_clicks;
    }
];
