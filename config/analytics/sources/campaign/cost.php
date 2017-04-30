<?php
return [
    "metric" => "cost",
    "entity" => "Campaign",
    "platform" => "analytics",
    "report" => "GA_DEFAULT",
    "fields" => [
        "ga:adCost"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ga:adCost'}));
    },
    "sum" => NULL
];
