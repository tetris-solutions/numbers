<?php
return [
    "metric" => "adcost",
    "entity" => "Campaign",
    "fields" => [
        "ga:adCost"
    ],
    "report" => "GA_DEFAULT",
    "platform" => "analytics",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ga:adCost'}));
    }
];
