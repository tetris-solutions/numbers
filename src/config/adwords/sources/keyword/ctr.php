<?php
return [
    "metric" => "ctr",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "Ctr"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->Ctr)) / 100;
    },
    "sum" => NULL
];
