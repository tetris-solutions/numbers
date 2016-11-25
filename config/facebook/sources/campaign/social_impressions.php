<?php
return [
    "metric" => "social_impressions",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "social_impressions"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->social_impressions);
    }
];
