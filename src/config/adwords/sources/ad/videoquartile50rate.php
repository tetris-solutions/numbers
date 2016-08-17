<?php
return [
    "metric" => "videoquartile50rate",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "VideoQuartile50Rate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->VideoQuartile50Rate)) / 100;
    },
    "sum" => NULL
];
