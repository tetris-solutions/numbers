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
        return floatval($data->cpm);
    }
];
