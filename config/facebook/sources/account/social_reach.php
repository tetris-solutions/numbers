<?php
return [
    "metric" => "social_reach",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "social_reach"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->social_reach);
    }
];
