<?php
return [
    "metric" => "interactiontypes",
    "entity" => "Location",
    "fields" => [
        "InteractionTypes"
    ],
    "report" => "GEO_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data) {
        return $data->{'InteractionTypes'};
    }
];
