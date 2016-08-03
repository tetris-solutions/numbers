<?php
return [
    "metric" => "conversionvalue",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "ConversionValue"
    ],
    "parse" => function ($data): int {
      return (int)$data->ConversionValue;
    }
];
