<?php
return [
    "metric" => "interactiontypes",
    "entity" => "Audience",
    "platform" => "adwords",
    "report" => "AUDIENCE_PERFORMANCE_REPORT",
    "fields" => [
        "InteractionTypes"
    ],
    "parse" => function ($data) {
        return $data->InteractionTypes;
    }
];
