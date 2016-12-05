<?php
return [
    "metric" => "social_reach",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "social_reach"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->social_reach);
    },
    "sum" => NULL
];
