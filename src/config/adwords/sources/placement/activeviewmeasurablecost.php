<?php
return [
    "metric" => "activeviewmeasurablecost",
    "entity" => "Placement",
    "platform" => "adwords",
    "report" => "AUTOMATIC_PLACEMENTS_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewMeasurableCost"
    ],
    "parse" => function ($data): float {
        return (float)$data->ActiveViewMeasurableCost;
    }
];
