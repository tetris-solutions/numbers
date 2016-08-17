<?php
return [
    "metric" => "interactionrate",
    "entity" => "Adgroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "InteractionRate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->InteractionRate)) / 100;
    },
    "sum" => NULL
];
