<?php
return [
    "metric" => "percentnewvisitors",
    "entity" => "Adgroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "PercentNewVisitors"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->PercentNewVisitors)) / 100;
    },
    "sum" => NULL
];
