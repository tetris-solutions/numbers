<?php
return [
    "metric" => "conversionrate",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "ConversionRate"
    ],
    "parse" => function ($data): float {
      return floatval(str_replace('%', '', $data->ConversionRate)) / 100;
    }
];
