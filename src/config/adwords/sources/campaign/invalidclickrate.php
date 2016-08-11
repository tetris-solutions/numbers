<?php
return [
    "metric" => "invalidclickrate",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "InvalidClickRate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->InvalidClickRate)) / 100;
    },
    "sum" => NULL
];
