<?php
return [
    "metric" => "averagecost",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "AverageCost"
    ],
    "parse" => function ($data): float {
        return (float)$data->AverageCost;
    },
    "sum" => NULL
];
