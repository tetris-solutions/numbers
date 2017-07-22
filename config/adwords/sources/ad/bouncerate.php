<?php
return [
    "metric" => "bouncerate",
    "entity" => "Ad",
    "fields" => [
        "BounceRate"
    ],
    "report" => "AD_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        $valueAsNumericString = str_replace(['%', ','], '', $data->{'BounceRate'});
    
        return floatval($valueAsNumericString) / 100;
    }
];
