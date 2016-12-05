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
        return (float)str_replace(',', '', $data->cpm);
    },
    "sum" => NULL
];
