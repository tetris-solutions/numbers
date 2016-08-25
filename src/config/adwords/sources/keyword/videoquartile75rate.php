<?php
return [
    "metric" => "videoquartile75rate",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "VideoQuartile75Rate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->VideoQuartile75Rate)) / 100;
    },
    "sum" => NULL
];
