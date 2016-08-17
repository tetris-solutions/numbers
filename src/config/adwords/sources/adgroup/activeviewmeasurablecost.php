<?php
return [
    "metric" => "activeviewmeasurablecost",
    "entity" => "AdGroup",
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
