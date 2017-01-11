<?php
return [
    "metric" => "reach",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "reach"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'reach'}));
    },
    "sum" => NULL
];
