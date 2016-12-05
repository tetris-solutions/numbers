<?php
return [
    "metric" => "cpm",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "cpm"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->cpm);
    },
    "sum" => NULL
];
