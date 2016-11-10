<?php
return [
    "metric" => "percentnewvisitors",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "PercentNewVisitors"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->PercentNewVisitors)) / 100;
    }
];
