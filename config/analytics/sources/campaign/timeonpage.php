<?php
return [
    "metric" => "timeonpage",
    "entity" => "Campaign",
    "platform" => "analytics",
    "report" => "GA_DEFAULT",
    "fields" => [
        "ga:timeOnPage"
    ],
    "parse" => function ($data) {
        return $data->{'ga:timeOnPage'};
    },
    "sum" => NULL
];
