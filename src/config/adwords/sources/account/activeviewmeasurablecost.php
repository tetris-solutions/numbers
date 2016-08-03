<?php
return [
    "metric" => "activeviewmeasurablecost",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewMeasurableCost"
    ],
    "parse" => function ($data): float {
      return (float)$data->ActiveViewMeasurableCost;
    }
];
