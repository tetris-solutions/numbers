<?php
return [
    "metric" => "costperconversion",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "CostPerConversion"
    ],
    "parse" => function ($data): float {
        return (float)$data->CostPerConversion;
    },
    "sum" => NULL
];
