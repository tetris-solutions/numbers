<?php
return [
    "metric" => "bouncerate",
    "entity" => "Adgroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "BounceRate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->BounceRate)) / 100;
    },
    "sum" => NULL
];
