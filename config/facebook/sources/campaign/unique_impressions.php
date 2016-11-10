<?php
return [
    "metric" => "unique_impressions",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "unique_impressions"
    ],
    "parse" => function ($data) {
        return (float)$data->unique_impressions;
    }
];
