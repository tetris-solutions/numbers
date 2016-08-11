<?php
return [
    "metric" => "costperconvertedclick",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "CostPerConvertedClick"
    ],
    "parse" => function ($data): float {
        return (float)$data->CostPerConvertedClick;
    },
    "sum" => NULL
];
