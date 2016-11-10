<?php
return [
    "metric" => "social_impressions",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "social_impressions"
    ],
    "parse" => function ($data) {
        return (float)$data->social_impressions;
    }
];
