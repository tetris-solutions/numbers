<?php
return [
    "metric" => "averagecpv",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "AverageCpv"
    ],
    "parse" => function ($data): int {
      return (int)$data->AverageCpv;
    }
];
