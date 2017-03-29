<?php
return [
    "metric" => "pageviewspersession",
    "entity" => "Campaign",
    "platform" => "analytics",
    "report" => "GA_DEFAULT",
    "fields" => [
        "ga:pageviewsPerSession"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ga:pageviewsPerSession'}));
    },
    "sum" => NULL
];
