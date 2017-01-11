<?php
return [
    "metric" => "bouncerate",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "BounceRate"
    ],
    "parse" => function ($data): float {
        $valueAsNumericString = str_replace(['%', ','], '', $data->{'BounceRate'});
    
        return floatval($valueAsNumericString) / 100;
    }
];
