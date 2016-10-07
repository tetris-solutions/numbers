<?php
return [
    "metric" => "spend",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "spend"
    ],
    "parse" => function ($data) {
        return floatval($data->spend);
    }
];
