<?php
return [
    "metric" => "tdv",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "tdv"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'tdv'}));
    },
    "sum" => NULL
];
