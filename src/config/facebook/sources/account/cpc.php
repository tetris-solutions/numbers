<?php
return [
    "metric" => "cpc",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "cpc"
    ],
    "parse" => function ($data) {
        return floatval($data->cpc);
    }
];
