<?php
return [
    "metric" => "roas",
    "entity" => "Campaign",
    "platform" => "analytics",
    "report" => "GA_DEFAULT",
    "fields" => [
        "ga:ROAS"
    ],
    "parse" => function ($data): float {
        $valueAsNumericString = str_replace(['%', ','], '', $data->{'ga:ROAS'});
    
        return floatval($valueAsNumericString) / 100;
    },
    "sum" => NULL
];
