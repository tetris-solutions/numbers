<?php
return [
    "metric" => "percentnewvisitors",
    "entity" => "AdGroup",
    "fields" => [
        "PercentNewVisitors"
    ],
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        $valueAsNumericString = str_replace(['%', ','], '', $data->{'PercentNewVisitors'});
    
        return floatval($valueAsNumericString) / 100;
    }
];
