<?php
return [
    "metric" => "bouncerate",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "BounceRate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(['%', ','], '', $data->BounceRate)) / 100;
    }
];
