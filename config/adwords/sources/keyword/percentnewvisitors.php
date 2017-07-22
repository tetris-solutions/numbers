<?php
return [
    "metric" => "percentnewvisitors",
    "entity" => "Keyword",
    "fields" => [
        "PercentNewVisitors"
    ],
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        $valueAsNumericString = str_replace(['%', ','], '', $data->{'PercentNewVisitors'});
    
        return floatval($valueAsNumericString) / 100;
    }
];
