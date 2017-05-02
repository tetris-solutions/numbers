<?php
return [
    "metric" => "bouncerate",
    "entity" => "Campaign",
    "platform" => "analytics",
    "report" => "GA_DEFAULT",
    "fields" => [
        "ga:bounceRate"
    ],
    "parse" => function ($data): float {
        $valueAsNumericString = str_replace(['%', ','], '', $data->{'ga:bounceRate'});
    
        return floatval($valueAsNumericString) / 100;
    },
    "sum" => NULL
];
