<?php
return [
    "metric" => "tdv",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "tdv"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'tdv'}));
    },
    "sum" => NULL
];
