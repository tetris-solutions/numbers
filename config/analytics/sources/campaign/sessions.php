<?php
return [
    "metric" => "sessions",
    "entity" => "Campaign",
    "platform" => "analytics",
    "report" => "GA_DEFAULT",
    "fields" => [
        "ga:sessions"
    ],
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ga:sessions'}));
    },
    "sum" => NULL
];
