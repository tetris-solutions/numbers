<?php
return [
    "metric" => "ctr",
    "entity" => "Campaign",
    "fields" => [
        "ga:CTR"
    ],
    "report" => "GA_DEFAULT",
    "platform" => "analytics",
    "parse" => function ($data): float {
        $valueAsNumericString = str_replace(['%', ','], '', $data->{'ga:CTR'});
    
        return floatval($valueAsNumericString) / 100;
    }
];
