<?php
return [
    "metric" => "adclicks",
    "entity" => "Campaign",
    "platform" => "analytics",
    "report" => "GA_DEFAULT",
    "fields" => [
        "ga:adClicks"
    ],
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ga:adClicks'}));
    },
    "sum" => NULL
];
