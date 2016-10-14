<?php
return [
    "metric" => "social_spend",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "social_spend"
    ],
    "parse" => function ($data) {
        return (float)$data->social_spend;
    }
];
