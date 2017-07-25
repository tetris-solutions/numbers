<?php
return [
    "metric" => "bouncerate",
    "entity" => "Campaign",
    "fields" => [
        "ga:bounceRate"
    ],
    "report" => "GA_DEFAULT",
    "platform" => "analytics",
    "parse" => function ($data): float {
        $valueAsNumericString = str_replace(['%', ','], '', $data->{'ga:bounceRate'});
    
        return floatval($valueAsNumericString) / 100;
    }
];
