<?php
return [
    "metric" => "pageviewspersession",
    "entity" => "Campaign",
    "fields" => [
        "ga:pageviewsPerSession"
    ],
    "report" => "GA_DEFAULT",
    "platform" => "analytics",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ga:pageviewsPerSession'}));
    }
];
