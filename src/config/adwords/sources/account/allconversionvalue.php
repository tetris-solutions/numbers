<?php
return [
    "metric" => "allconversionvalue",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "AllConversionValue"
    ],
    "parse" => function ($data): int {
      return (int)$data->AllConversionValue;
    }
];
