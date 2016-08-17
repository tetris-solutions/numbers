<?php
return [
    "metric" => "videoviewrate",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "VideoViewRate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->VideoViewRate)) / 100;
    },
    "sum" => NULL
];
