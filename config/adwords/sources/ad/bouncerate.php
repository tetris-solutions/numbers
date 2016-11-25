<?php
return [
    "metric" => "bouncerate",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "BounceRate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(['%', ','], '', $data->BounceRate)) / 100;
    }
];
