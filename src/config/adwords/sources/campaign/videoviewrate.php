<?php
return [
    "metric" => "videoviewrate",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "VideoViewRate"
    ],
    "parse" => function ($data): float {
      return floatval(str_replace('%', '', $data->VideoViewRate)) / 100;
    }
];
