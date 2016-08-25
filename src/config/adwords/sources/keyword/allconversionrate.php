<?php
return [
    "metric" => "allconversionrate",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "AllConversionRate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->AllConversionRate)) / 100;
    },
    "sum" => NULL
];
