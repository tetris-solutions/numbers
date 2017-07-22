<?php
return [
    "metric" => "interactiontypes",
    "entity" => "Search",
    "fields" => [
        "InteractionTypes"
    ],
    "report" => "SEARCH_QUERY_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data) {
        return $data->{'InteractionTypes'};
    }
];
