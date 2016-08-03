<?php
return [
    "metric" => "numofflineimpressions",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "NumOfflineImpressions"
    ],
    "parse" => function ($data): int {
      return (int)$data->NumOfflineImpressions;
    }
];
