<?php
return [
    "metric" => "allconversionrate",
    "entity" => "Adgroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "AllConversionRate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->AllConversionRate)) / 100;
    },
    "sum" => NULL
];
