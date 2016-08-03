<?php
return [
    "metric" => "costperallconversion",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "CostPerAllConversion"
    ],
    "parse" => function ($data): float {
      return (float)$data->CostPerAllConversion;
    }
];
