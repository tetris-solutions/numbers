<?php
return [
    "metric" => "averageposition",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "AveragePosition"
    ],
    "parse" => function ($data): int {
      return (int)$data->AveragePosition;
    }
];
