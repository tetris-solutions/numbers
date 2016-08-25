<?php
return [
    "metric" => "bouncerate",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "BounceRate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->BounceRate)) / 100;
    },
    "sum" => NULL
];
