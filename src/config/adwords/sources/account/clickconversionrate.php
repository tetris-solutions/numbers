<?php
return [
    "metric" => "clickconversionrate",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "ClickConversionRate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->ClickConversionRate)) / 100;
    },
    "sum" => NULL
];
