<?php
return [
    "metric" => "valueperallconversion",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "ValuePerAllConversion"
    ],
    "parse" => function ($data): int {
      return (int)$data->ValuePerAllConversion;
    }
];
