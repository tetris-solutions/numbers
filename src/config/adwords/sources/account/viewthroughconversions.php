<?php
return [
    "metric" => "viewthroughconversions",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "ViewThroughConversions"
    ],
    "parse" => function ($data): int {
      return (int)$data->ViewThroughConversions;
    }
];
