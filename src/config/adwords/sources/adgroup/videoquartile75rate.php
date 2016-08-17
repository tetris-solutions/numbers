<?php
return [
    "metric" => "videoquartile75rate",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "VideoQuartile75Rate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->VideoQuartile75Rate)) / 100;
    },
    "sum" => NULL
];
