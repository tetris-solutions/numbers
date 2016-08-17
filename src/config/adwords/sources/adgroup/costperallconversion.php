<?php
return [
    "metric" => "costperallconversion",
    "entity" => "AdGroup",
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
