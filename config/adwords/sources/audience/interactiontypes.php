<?php
return [
    "metric" => "interactiontypes",
    "entity" => "Audience",
    "fields" => [
        "InteractionTypes"
    ],
    "report" => "AUDIENCE_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data) {
        return $data->{'InteractionTypes'};
    }
];
