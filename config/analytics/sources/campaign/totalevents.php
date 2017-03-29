<?php
return [
    "metric" => "totalevents",
    "entity" => "Campaign",
    "platform" => "analytics",
    "report" => "GA_DEFAULT",
    "fields" => [
        "ga:totalEvents"
    ],
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ga:totalEvents'}));
    },
    "sum" => NULL
];
