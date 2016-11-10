<?php
return [
    "metric" => "social_reach",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "social_reach"
    ],
    "parse" => function ($data) {
        return (float)$data->social_reach;
    }
];
