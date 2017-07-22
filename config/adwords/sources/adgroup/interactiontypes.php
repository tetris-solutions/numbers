<?php
return [
    "metric" => "interactiontypes",
    "entity" => "AdGroup",
    "fields" => [
        "InteractionTypes"
    ],
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data) {
        return $data->{'InteractionTypes'};
    }
];
