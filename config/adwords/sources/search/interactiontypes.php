<?php
return [
    "metric" => "interactiontypes",
    "entity" => "Search",
    "platform" => "adwords",
    "report" => "SEARCH_QUERY_PERFORMANCE_REPORT",
    "fields" => [
        "InteractionTypes"
    ],
    "parse" => function ($data) {
        return $data->InteractionTypes;
    }
];
