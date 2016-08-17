<?php
return [
    "metric" => "videoquartile100rate",
    "entity" => "Adgroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "VideoQuartile100Rate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->VideoQuartile100Rate)) / 100;
    },
    "sum" => NULL
];
