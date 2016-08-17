<?php
return [
    "metric" => "engagementrate",
    "entity" => "Adgroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "EngagementRate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->EngagementRate)) / 100;
    },
    "sum" => NULL
];
