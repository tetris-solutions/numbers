<?php
return [
    "metric" => "activeviewmeasurability",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewMeasurability"
    ],
    "parse" => function ($data): int {
      return (int)$data->ActiveViewMeasurability;
    }
];
