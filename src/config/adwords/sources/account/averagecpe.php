<?php
return [
    "metric" => "averagecpe",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "AverageCpe"
    ],
    "parse" => function ($data): int {
      return (int)$data->AverageCpe;
    }
];
