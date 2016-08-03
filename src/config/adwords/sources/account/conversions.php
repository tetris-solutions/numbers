<?php
return [
    "metric" => "conversions",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "Conversions"
    ],
    "parse" => function ($data): int {
      return (int)$data->Conversions;
    }
];
