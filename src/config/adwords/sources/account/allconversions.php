<?php
return [
    "metric" => "allconversions",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "AllConversions"
    ],
    "parse" => function ($data): int {
      return (int)$data->AllConversions;
    }
];
