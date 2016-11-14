<?php
return [
    "metric" => "ctr",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "ctr"
    ],
    "parse" => function ($data) {
        return floatval($data->ctr) / 100;
    }
];
