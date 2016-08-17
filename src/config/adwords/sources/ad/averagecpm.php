<?php
return [
    "metric" => "averagecpm",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "AverageCpm"
    ],
    "parse" => function ($data): float {
        return (float)$data->AverageCpm;
    },
    "sum" => NULL
];
