<?php
return [
    "metric" => "interactionrate",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "InteractionRate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->InteractionRate)) / 100;
    },
    "sum" => NULL
];
