<?php
return [
    "metric" => "ctr",
    "entity" => "Campaign",
    "platform" => "analytics",
    "report" => "GA_DEFAULT",
    "fields" => [
        "ga:CTR"
    ],
    "parse" => function ($data): float {
        $valueAsNumericString = str_replace(['%', ','], '', $data->{'ga:CTR'});
    
        return floatval($valueAsNumericString) / 100;
    },
    "sum" => NULL
];
