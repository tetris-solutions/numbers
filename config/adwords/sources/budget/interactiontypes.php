<?php
return [
    "metric" => "interactiontypes",
    "entity" => "Budget",
    "fields" => [
        "InteractionTypes"
    ],
    "report" => "BUDGET_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data) {
        return $data->{'InteractionTypes'};
    }
];
