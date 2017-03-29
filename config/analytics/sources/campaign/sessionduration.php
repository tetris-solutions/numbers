<?php
return [
    "metric" => "sessionduration",
    "entity" => "Campaign",
    "platform" => "analytics",
    "report" => "GA_DEFAULT",
    "fields" => [
        "ga:sessionDuration"
    ],
    "parse" => function ($data) {
        return $data->{'ga:sessionDuration'};
    },
    "sum" => NULL
];
