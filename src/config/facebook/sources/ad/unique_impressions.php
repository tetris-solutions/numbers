<?php
return [
    "metric" => "unique_impressions",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "unique_impressions"
    ],
    "parse" => function ($data) {
        return (float)$data->unique_impressions;
    }
];
