<?php
return [
    "metric" => "impressions",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "impressions"
    ],
    "parse" => function ($data) {
        return (float)$data->impressions;
    }
];
