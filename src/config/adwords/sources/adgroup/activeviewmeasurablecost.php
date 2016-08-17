<?php
return [
    "metric" => "activeviewmeasurablecost",
    "entity" => "Adgroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewMeasurableCost"
    ],
    "parse" => function ($data): float {
        return (float)$data->ActiveViewMeasurableCost;
    },
    "sum" => NULL
];
