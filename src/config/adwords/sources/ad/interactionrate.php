<?php
return [
    "metric" => "interactionrate",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "InteractionRate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->InteractionRate)) / 100;
    },
    "sum" => NULL
];
