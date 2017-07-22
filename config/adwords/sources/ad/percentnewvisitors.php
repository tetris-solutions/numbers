<?php
return [
    "metric" => "percentnewvisitors",
    "entity" => "Ad",
    "fields" => [
        "PercentNewVisitors"
    ],
    "report" => "AD_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        $valueAsNumericString = str_replace(['%', ','], '', $data->{'PercentNewVisitors'});
    
        return floatval($valueAsNumericString) / 100;
    }
];
