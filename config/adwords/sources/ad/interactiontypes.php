<?php
return [
    "metric" => "interactiontypes",
    "entity" => "Ad",
    "fields" => [
        "InteractionTypes"
    ],
    "report" => "AD_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data) {
        return $data->{'InteractionTypes'};
    }
];
