<?php
return [
    "metric" => "interactiontypes",
    "entity" => "Account",
    "fields" => [
        "InteractionTypes"
    ],
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data) {
        return $data->{'InteractionTypes'};
    }
];
