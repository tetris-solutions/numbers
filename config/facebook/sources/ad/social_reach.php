<?php
return [
    "metric" => "social_reach",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "social_reach"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->{'social_reach'});
    },
    "sum" => NULL
];
