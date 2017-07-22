<?php
return [
    "metric" => "percentnewvisitors",
    "entity" => "Campaign",
    "fields" => [
        "PercentNewVisitors"
    ],
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        $valueAsNumericString = str_replace(['%', ','], '', $data->{'PercentNewVisitors'});
    
        return floatval($valueAsNumericString) / 100;
    }
];
