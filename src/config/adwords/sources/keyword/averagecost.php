<?php
return [
    "metric" => "averagecost",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "AverageCost"
    ],
    "parse" => function ($data): float {
        return (float)$data->AverageCost;
    },
    "sum" => NULL
];
