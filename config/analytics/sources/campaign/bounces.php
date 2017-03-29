<?php
return [
    "metric" => "bounces",
    "entity" => "Campaign",
    "platform" => "analytics",
    "report" => "GA_DEFAULT",
    "fields" => [
        "ga:bounces"
    ],
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ga:bounces'}));
    },
    "sum" => NULL
];
