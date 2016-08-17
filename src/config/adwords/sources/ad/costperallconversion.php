<?php
return [
    "metric" => "costperallconversion",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "CostPerAllConversion"
    ],
    "parse" => function ($data): float {
        return (float)$data->CostPerAllConversion;
    },
    "sum" => NULL
];
