<?php
return [
    "metric" => "averagecpc",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "AverageCpc"
    ],
    "parse" => function ($data): float {
        return (float)$data->AverageCpc;
    },
    "sum" => NULL
];
