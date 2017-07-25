<?php
return [
    "metric" => "percentnewsessions",
    "entity" => "Campaign",
    "fields" => [
        "ga:percentNewSessions"
    ],
    "report" => "GA_DEFAULT",
    "platform" => "analytics",
    "parse" => function ($data): float {
        $valueAsNumericString = str_replace(['%', ','], '', $data->{'ga:percentNewSessions'});
    
        return floatval($valueAsNumericString) / 100;
    }
];
