<?php
return [
    "metric" => "conversionrate",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "ConversionRate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->ConversionRate)) / 100;
    },
    "sum" => NULL
];
