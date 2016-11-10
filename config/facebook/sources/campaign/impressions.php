<?php
return [
    "metric" => "impressions",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "impressions"
    ],
    "parse" => function ($data) {
        return (float)$data->impressions;
    }
];
