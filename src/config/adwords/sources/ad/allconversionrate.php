<?php
return [
    "metric" => "allconversionrate",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "AllConversionRate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->AllConversionRate)) / 100;
    },
    "sum" => NULL
];
