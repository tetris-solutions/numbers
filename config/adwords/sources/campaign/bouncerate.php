<?php
return [
    "metric" => "bouncerate",
    "entity" => "Campaign",
    "fields" => [
        "BounceRate"
    ],
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        $valueAsNumericString = str_replace(['%', ','], '', $data->{'BounceRate'});
    
        return floatval($valueAsNumericString) / 100;
    }
];
