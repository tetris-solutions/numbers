<?php
return [
    "metric" => "unique_social_impressions",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "unique_social_impressions"
    ],
    "parse" => function ($data) {
        return (float)$data->unique_social_impressions;
    }
];
