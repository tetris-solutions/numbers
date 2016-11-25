<?php
return [
    "metric" => "social_spend",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "social_spend"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->social_spend);
    }
];
