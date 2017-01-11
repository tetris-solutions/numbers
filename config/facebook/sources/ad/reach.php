<?php
return [
    "metric" => "reach",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "reach"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'reach'}));
    },
    "sum" => NULL
];
