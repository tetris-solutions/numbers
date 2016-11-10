<?php
return [
    "metric" => "ctr",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "ctr"
    ],
    "parse" => function ($data) {
        return (float)$data->ctr;
    }
];
