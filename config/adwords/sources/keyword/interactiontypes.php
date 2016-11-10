<?php
return [
    "metric" => "interactiontypes",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "InteractionTypes"
    ],
    "parse" => function ($data) {
        return $data->InteractionTypes;
    }
];
