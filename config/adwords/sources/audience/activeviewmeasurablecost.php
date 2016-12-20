<?php
return [
    "metric" => "activeviewmeasurablecost",
    "entity" => "Audience",
    "platform" => "adwords",
    "report" => "AUDIENCE_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewMeasurableCost"
    ],
    "parse" => function ($data): float {
        return (float)str_replace(',', '', $data->ActiveViewMeasurableCost);
    }
];
