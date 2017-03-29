<?php
return [
    "metric" => "goalstartsall",
    "entity" => "Campaign",
    "platform" => "analytics",
    "report" => "GA_DEFAULT",
    "fields" => [
        "ga:goalStartsAll"
    ],
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ga:goalStartsAll'}));
    },
    "sum" => NULL
];
