<?php
return [
    "metric" => "percentnewvisitors",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "PercentNewVisitors"
    ],
    "parse" => function ($data): float {
        $valueAsNumericString = str_replace(['%', ','], '', $data->{'PercentNewVisitors'});
    
        return floatval($valueAsNumericString) / 100;
    }
];
