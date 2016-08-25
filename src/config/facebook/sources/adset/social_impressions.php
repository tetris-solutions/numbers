<?php
return [
    "metric" => "social_impressions",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "social_impressions"
    ],
    "parse" => function ($data) {
        return (float)$data->social_impressions;
    }
];
