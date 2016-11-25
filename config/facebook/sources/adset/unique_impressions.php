<?php
return [
    "metric" => "unique_impressions",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "unique_impressions"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->unique_impressions);
    }
];
