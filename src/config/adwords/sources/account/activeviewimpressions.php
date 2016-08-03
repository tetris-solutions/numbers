<?php
return [
    "metric" => "activeviewimpressions",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewImpressions"
    ],
    "parse" => function ($data): int {
      return (int)$data->ActiveViewImpressions;
    }
];
