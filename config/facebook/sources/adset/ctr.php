<?php
return [
    "metric" => "ctr",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "ctr"
    ],
    "parse" => function ($data) {
        return floatval(str_replace(',', '', $data->ctr)) / 100;
    }
];
