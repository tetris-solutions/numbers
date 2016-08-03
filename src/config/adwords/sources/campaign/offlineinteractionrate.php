<?php
return [
    "metric" => "offlineinteractionrate",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "OfflineInteractionRate"
    ],
    "parse" => function ($data): int {
      return (int)$data->OfflineInteractionRate;
    }
];
