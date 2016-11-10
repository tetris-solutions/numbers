<?php
return [
    "metric" => "newsfeed_impressions",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "newsfeed_impressions"
    ],
    "parse" => function ($data) {
        return (float)$data->newsfeed_impressions;
    }
];
