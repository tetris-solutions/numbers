<?php
return [
    "metric" => "costperallconversion",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "CostPerAllConversion"
    ],
    "parse" => function ($data): float {
        return (float)$data->CostPerAllConversion;
    },
    "sum" => NULL
];
