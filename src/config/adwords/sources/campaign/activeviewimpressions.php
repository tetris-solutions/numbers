<?php
return [
    "metric" => "activeviewimpressions",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewImpressions"
    ],
    "parse" => function ($data): int {
      return (int)$data->ActiveViewImpressions;
    }
];
