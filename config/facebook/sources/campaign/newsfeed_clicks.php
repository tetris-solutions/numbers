<?php
return [
    "metric" => "newsfeed_clicks",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "newsfeed_clicks"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->newsfeed_clicks);
    }
];
