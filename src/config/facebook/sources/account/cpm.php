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
        return (float)$data->cpm;
    }
];
