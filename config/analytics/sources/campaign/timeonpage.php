<?php
return [
    "metric" => "timeonpage",
    "entity" => "Campaign",
    "fields" => [
        "ga:timeOnPage"
    ],
    "report" => "GA_DEFAULT",
    "platform" => "analytics",
    "parse" => function ($data) {
        return $data->{'ga:timeOnPage'};
    }
];
