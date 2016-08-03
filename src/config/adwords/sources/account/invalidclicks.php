<?php
return [
    "metric" => "invalidclicks",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "InvalidClicks"
    ],
    "parse" => function ($data): int {
      return (int)$data->InvalidClicks;
    }
];
