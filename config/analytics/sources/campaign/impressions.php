<?php
return [
    "metric" => "impressions",
    "entity" => "Campaign",
    "platform" => "analytics",
    "report" => "GA_DEFAULT",
    "fields" => [
        "ga:impressions"
    ],
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ga:impressions'}));
    },
    "sum" => NULL
];
