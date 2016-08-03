<?php
return [
    "metric" => "numofflineinteractions",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "NumOfflineInteractions"
    ],
    "parse" => function ($data): int {
      return (int)$data->NumOfflineInteractions;
    }
];
