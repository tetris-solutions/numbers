<?php
return [
    "metric" => "deeplink_clicks",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "deeplink_clicks"
    ],
    "parse" => function ($data) {
        return (float)$data->deeplink_clicks;
    }
];
