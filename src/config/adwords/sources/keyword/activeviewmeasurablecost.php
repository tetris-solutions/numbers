<?php
return [
    "metric" => "activeviewmeasurablecost",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewMeasurableCost"
    ],
    "parse" => function ($data): float {
        return (float)$data->ActiveViewMeasurableCost;
    }
];
