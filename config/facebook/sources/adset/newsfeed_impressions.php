<?php
return [
    "metric" => "newsfeed_impressions",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "newsfeed_impressions"
    ],
    "parse" => function ($data) {
        return (float)$data->newsfeed_impressions;
    }
];
