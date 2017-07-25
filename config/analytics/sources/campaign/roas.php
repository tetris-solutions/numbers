<?php
return [
    "metric" => "roas",
    "entity" => "Campaign",
    "fields" => [
        "ga:ROAS"
    ],
    "report" => "GA_DEFAULT",
    "platform" => "analytics",
    "parse" => function ($data): float {
        $valueAsNumericString = str_replace(['%', ','], '', $data->{'ga:ROAS'});
    
        return floatval($valueAsNumericString) / 100;
    }
];
