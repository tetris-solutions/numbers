<?php
return [
    "metric" => "videoviewrate",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "VideoViewRate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->VideoViewRate)) / 100;
    },
    "sum" => NULL
];
