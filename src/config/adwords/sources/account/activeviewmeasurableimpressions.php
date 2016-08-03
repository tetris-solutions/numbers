<?php
return [
    "metric" => "activeviewmeasurableimpressions",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewMeasurableImpressions"
    ],
    "parse" => function ($data): int {
      return (int)$data->ActiveViewMeasurableImpressions;
    }
];
