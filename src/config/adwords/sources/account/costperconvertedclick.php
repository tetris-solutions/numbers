<?php
return [
    "metric" => "costperconvertedclick",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "CostPerConvertedClick"
    ],
    "parse" => function ($data): float {
        return (float)$data->CostPerConvertedClick;
    },
    "sum" => NULL
];
