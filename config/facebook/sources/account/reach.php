<?php
return [
    "metric" => "reach",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "reach"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'reach'}));
    },
    "sum" => NULL
];
