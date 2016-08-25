<?php
return [
    "metric" => "costperconversion",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "CostPerConversion"
    ],
    "parse" => function ($data): float {
        return (float)$data->CostPerConversion;
    },
    "sum" => NULL
];
