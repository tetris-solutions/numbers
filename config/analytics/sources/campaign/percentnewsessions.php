<?php
return [
    "metric" => "percentnewsessions",
    "entity" => "Campaign",
    "platform" => "analytics",
    "report" => "GA_DEFAULT",
    "fields" => [
        "ga:percentNewSessions"
    ],
    "parse" => function ($data): float {
        $valueAsNumericString = str_replace(['%', ','], '', $data->{'ga:percentNewSessions'});
    
        return floatval($valueAsNumericString) / 100;
    },
    "sum" => NULL
];
