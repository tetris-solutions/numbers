<?php
return [
    "metric" => "ctr",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "Ctr"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->Ctr)) / 100;
    },
    "sum" => NULL
];
