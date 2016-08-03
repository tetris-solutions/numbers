<?php
return [
    "metric" => "valueperconvertedclick",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "ValuePerConvertedClick"
    ],
    "parse" => function ($data): int {
      return (int)$data->ValuePerConvertedClick;
    }
];
