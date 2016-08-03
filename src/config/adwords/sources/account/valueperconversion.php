<?php
return [
    "metric" => "valueperconversion",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "ValuePerConversion"
    ],
    "parse" => function ($data): int {
      return (int)$data->ValuePerConversion;
    }
];
