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
        return (float)str_replace(',', '', $data->social_clicks);
    }
];
