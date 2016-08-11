<?php
return [
    "metric" => "allconversionrate",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "AllConversionRate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->AllConversionRate)) / 100;
    },
    "sum" => NULL
];
