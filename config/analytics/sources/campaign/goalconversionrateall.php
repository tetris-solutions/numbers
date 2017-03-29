<?php
return [
    "metric" => "goalconversionrateall",
    "entity" => "Campaign",
    "platform" => "analytics",
    "report" => "GA_DEFAULT",
    "fields" => [
        "ga:goalConversionRateAll"
    ],
    "parse" => function ($data): float {
        $valueAsNumericString = str_replace(['%', ','], '', $data->{'ga:goalConversionRateAll'});
    
        return floatval($valueAsNumericString) / 100;
    },
    "sum" => NULL
];
