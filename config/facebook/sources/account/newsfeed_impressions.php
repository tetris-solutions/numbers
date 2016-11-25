<?php
return [
    "metric" => "newsfeed_impressions",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "newsfeed_impressions"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->newsfeed_impressions);
    }
];
