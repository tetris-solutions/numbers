<?php
return [
    "metric" => "sessionduration",
    "entity" => "Campaign",
    "fields" => [
        "ga:sessionDuration"
    ],
    "report" => "GA_DEFAULT",
    "platform" => "analytics",
    "parse" => function ($data) {
        return $data->{'ga:sessionDuration'};
    }
];
