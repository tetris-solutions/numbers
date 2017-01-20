<?php
return [
    "metric" => "tdv",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "tdv"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'tdv'}));
    },
    "sum" => NULL
];
