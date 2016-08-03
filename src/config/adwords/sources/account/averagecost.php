<?php
return [
    "metric" => "averagecost",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "AverageCost"
    ],
    "parse" => function ($data): float {
      return (float)$data->AverageCost;
    }
];
