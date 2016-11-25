<?php
return [
    "metric" => "percentnewvisitors",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "PercentNewVisitors"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(['%', ','], '', $data->PercentNewVisitors)) / 100;
    }
];
