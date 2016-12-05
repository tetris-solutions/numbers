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
        return (float)str_replace(',', '', $data->cpc);
    },
    "sum" => NULL
];
