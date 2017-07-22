<?php
return [
    "metric" => "bouncerate",
    "entity" => "Keyword",
    "fields" => [
        "BounceRate"
    ],
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        $valueAsNumericString = str_replace(['%', ','], '', $data->{'BounceRate'});
    
        return floatval($valueAsNumericString) / 100;
    }
];
