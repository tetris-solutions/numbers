<?php
return [
    "metric" => "interactiontypes",
    "entity" => "Campaign",
    "fields" => [
        "InteractionTypes"
    ],
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data) {
        return $data->{'InteractionTypes'};
    }
];
