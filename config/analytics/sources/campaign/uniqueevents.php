<?php
return [
    "metric" => "uniqueevents",
    "entity" => "Campaign",
    "platform" => "analytics",
    "report" => "GA_DEFAULT",
    "fields" => [
        "ga:uniqueEvents"
    ],
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ga:uniqueEvents'}));
    },
    "sum" => NULL
];
