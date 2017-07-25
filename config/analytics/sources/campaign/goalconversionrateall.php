<?php
return [
    "metric" => "goalconversionrateall",
    "entity" => "Campaign",
    "fields" => [
        "ga:goalConversionRateAll"
    ],
    "report" => "GA_DEFAULT",
    "platform" => "analytics",
    "parse" => function ($data): float {
        $valueAsNumericString = str_replace(['%', ','], '', $data->{'ga:goalConversionRateAll'});
    
        return floatval($valueAsNumericString) / 100;
    }
];
