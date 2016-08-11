<?php
return [
    "metric" => "averagecpm",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "AverageCpm"
    ],
    "parse" => function ($data): float {
        return (float)$data->AverageCpm;
    },
    "sum" => NULL
];
