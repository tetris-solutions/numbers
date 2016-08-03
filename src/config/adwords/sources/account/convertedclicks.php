<?php
return [
    "metric" => "convertedclicks",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "ConvertedClicks"
    ],
    "parse" => function ($data): int {
      return (int)$data->ConvertedClicks;
    }
];
