<?php
return [
    "metric" => "interactiontypes",
    "entity" => "Keyword",
    "fields" => [
        "InteractionTypes"
    ],
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data) {
        return $data->{'InteractionTypes'};
    }
];
