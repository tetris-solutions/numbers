<?php
return [
    "metric" => "cpc",
    "entity" => "Campaign",
    "fields" => [
        "ga:CPC"
    ],
    "report" => "GA_DEFAULT",
    "platform" => "analytics",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ga:CPC'}));
    }
];
