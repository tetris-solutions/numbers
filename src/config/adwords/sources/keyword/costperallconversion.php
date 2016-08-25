<?php
return [
    "metric" => "costperallconversion",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "CostPerAllConversion"
    ],
    "parse" => function ($data): float {
        return (float)$data->CostPerAllConversion;
    },
    "sum" => NULL
];
