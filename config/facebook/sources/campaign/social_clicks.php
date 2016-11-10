<?php
return [
    "metric" => "social_clicks",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "social_clicks"
    ],
    "parse" => function ($data) {
        return (float)$data->social_clicks;
    }
];
