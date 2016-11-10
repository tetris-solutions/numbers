<?php
return [
    "metric" => "interactiontypes",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "InteractionTypes"
    ],
    "parse" => function ($data) {
        return $data->InteractionTypes;
    }
];
