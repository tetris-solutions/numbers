<?php
return [
    "metric" => "videoquartile50rate",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "VideoQuartile50Rate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->VideoQuartile50Rate)) / 100;
    },
    "sum" => NULL
];
