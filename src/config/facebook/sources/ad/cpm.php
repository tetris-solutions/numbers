<?php
return [
    "metric" => "cpm",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "cpm"
    ],
    "parse" => function ($data) {
        return intval($data->cpm) / 100;
    }
];
