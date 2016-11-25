<?php
return [
    "metric" => "percentnewvisitors",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "PercentNewVisitors"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(['%', ','], '', $data->PercentNewVisitors)) / 100;
    }
];
