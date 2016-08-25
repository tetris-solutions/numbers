<?php
return [
    "metric" => "unique_social_impressions",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "unique_social_impressions"
    ],
    "parse" => function ($data) {
        return (float)$data->unique_social_impressions;
    }
];
