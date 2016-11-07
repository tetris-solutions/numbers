<?php
return [
    "metric" => "interactiontypes",
    "entity" => "Placement",
    "platform" => "adwords",
    "report" => "AUTOMATIC_PLACEMENTS_PERFORMANCE_REPORT",
    "fields" => [
        "InteractionTypes"
    ],
    "parse" => function ($data) {
        return $data->InteractionTypes;
    }
];
