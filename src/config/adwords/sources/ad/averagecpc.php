<?php
return [
    "metric" => "averagecpc",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "AverageCpc"
    ],
    "parse" => function ($data): float {
        return (float)$data->AverageCpc;
    },
    "sum" => NULL
];
