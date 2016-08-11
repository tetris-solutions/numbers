<?php
return [
    "metric" => "averagecpc",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "AverageCpc"
    ],
    "parse" => function ($data): float {
        return (float)$data->AverageCpc;
    },
    "sum" => NULL
];
