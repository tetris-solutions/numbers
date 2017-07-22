<?php
return [
    "metric" => "interactiontypes",
    "entity" => "Placement",
    "fields" => [
        "InteractionTypes"
    ],
    "report" => "AUTOMATIC_PLACEMENTS_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data) {
        return $data->{'InteractionTypes'};
    }
];
