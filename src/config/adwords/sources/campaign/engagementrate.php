<?php
return [
    "metric" => "engagementrate",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "EngagementRate"
    ],
    "parse" => function ($data): float {
      return floatval(str_replace('%', '', $data->EngagementRate)) / 100;
    }
];
