<?php
return [
    "metric" => "goalcompletionsall",
    "entity" => "Campaign",
    "platform" => "analytics",
    "report" => "GA_DEFAULT",
    "fields" => [
        "ga:goalCompletionsAll"
    ],
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ga:goalCompletionsAll'}));
    },
    "sum" => NULL
];
