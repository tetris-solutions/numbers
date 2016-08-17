<?php
return [
    "metric" => "costperallconversion",
    "entity" => "Adgroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "CostPerAllConversion"
    ],
    "parse" => function ($data): float {
        return (float)$data->CostPerAllConversion;
    },
    "sum" => NULL
];
