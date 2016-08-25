<?php
return [
    "metric" => "newsfeed_avg_position",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "newsfeed_avg_position"
    ],
    "parse" => function ($data) {
        return (float)$data->newsfeed_avg_position;
    }
];
