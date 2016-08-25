<?php
return [
    "metric" => "cpm",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "cpm"
    ],
    "parse" => function ($data) {
        return intval($data->cpm) / 100;
    }
];
