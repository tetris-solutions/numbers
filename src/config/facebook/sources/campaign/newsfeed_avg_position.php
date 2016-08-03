<?php
return [
    "metric" => "newsfeed_avg_position",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "newsfeed_avg_position"
    ],
    "parse" => function ($data) {
        return (float)$data->newsfeed_avg_position;
    }
];
