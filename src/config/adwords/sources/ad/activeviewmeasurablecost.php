<?php
return [
    "metric" => "activeviewmeasurablecost",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewMeasurableCost"
    ],
    "parse" => function ($data): float {
        return (float)$data->ActiveViewMeasurableCost;
    },
    "sum" => NULL
];
