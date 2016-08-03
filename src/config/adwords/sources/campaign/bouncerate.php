<?php
return [
    "metric" => "bouncerate",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "BounceRate"
    ],
    "parse" => function ($data): float {
      return floatval(str_replace('%', '', $data->BounceRate)) / 100;
    }
];
