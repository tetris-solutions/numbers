<?php
return [
    "metric" => "averagecost",
    "entity" => "Adgroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "AverageCost"
    ],
    "parse" => function ($data): float {
        return (float)$data->AverageCost;
    },
    "sum" => NULL
];
