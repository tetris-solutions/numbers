<?php
return [
    "metric" => "impressions",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "impressions"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->impressions);
    }
];
