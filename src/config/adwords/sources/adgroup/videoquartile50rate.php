<?php
return [
    "metric" => "videoquartile50rate",
    "entity" => "Adgroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "VideoQuartile50Rate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->VideoQuartile50Rate)) / 100;
    },
    "sum" => NULL
];
