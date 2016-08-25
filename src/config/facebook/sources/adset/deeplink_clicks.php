<?php
return [
    "metric" => "deeplink_clicks",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "deeplink_clicks"
    ],
    "parse" => function ($data) {
        return (float)$data->deeplink_clicks;
    }
];
