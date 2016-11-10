<?php
return [
    "metric" => "unique_social_impressions",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "unique_social_impressions"
    ],
    "parse" => function ($data) {
        return (float)$data->unique_social_impressions;
    }
];
