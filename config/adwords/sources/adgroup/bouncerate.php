<?php
return [
    "metric" => "bouncerate",
    "entity" => "AdGroup",
    "fields" => [
        "BounceRate"
    ],
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        $valueAsNumericString = str_replace(['%', ','], '', $data->{'BounceRate'});
    
        return floatval($valueAsNumericString) / 100;
    }
];
