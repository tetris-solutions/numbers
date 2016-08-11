<?php
return [
    "metric" => "videoquartile25rate",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "VideoQuartile25Rate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->VideoQuartile25Rate)) / 100;
    },
    "sum" => NULL
];
