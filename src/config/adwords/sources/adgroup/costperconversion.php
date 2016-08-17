<?php
return [
    "metric" => "costperconversion",
    "entity" => "Adgroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "CostPerConversion"
    ],
    "parse" => function ($data): float {
        return (float)$data->CostPerConversion;
    },
    "sum" => NULL
];
