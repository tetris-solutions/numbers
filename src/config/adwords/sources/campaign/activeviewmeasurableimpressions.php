<?php
return [
    "metric" => "activeviewmeasurableimpressions",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewMeasurableImpressions"
    ],
    "parse" => function ($data): int {
      return (int)$data->ActiveViewMeasurableImpressions;
    }
];
