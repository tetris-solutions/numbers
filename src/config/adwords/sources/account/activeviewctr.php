<?php
return [
    "metric" => "activeviewctr",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewCtr"
    ],
    "parse" => function ($data): int {
      return (int)$data->ActiveViewCtr;
    }
];
