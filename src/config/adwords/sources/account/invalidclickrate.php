<?php
return [
    "metric" => "invalidclickrate",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "InvalidClickRate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->InvalidClickRate)) / 100;
    },
    "sum" => NULL
];
