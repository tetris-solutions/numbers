<?php
return [
    "metric" => "newusers",
    "entity" => "Campaign",
    "platform" => "analytics",
    "report" => "GA_DEFAULT",
    "fields" => [
        "ga:newUsers"
    ],
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ga:newUsers'}));
    },
    "sum" => NULL
];
