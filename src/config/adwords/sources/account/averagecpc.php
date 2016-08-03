<?php
return [
    "metric" => "averagecpc",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "AverageCpc"
    ],
    "parse" => function ($data): float {
      return (float)$data->AverageCpc;
    }
];
