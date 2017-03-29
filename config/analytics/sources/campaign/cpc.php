<?php
return [
    "metric" => "cpc",
    "entity" => "Campaign",
    "platform" => "analytics",
    "report" => "GA_DEFAULT",
    "fields" => [
        "ga:CPC"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ga:CPC'}));
    },
    "sum" => NULL
];
