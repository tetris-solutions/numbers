<?php
return [
    "metric" => "videoquartile50rate",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "VideoQuartile50Rate"
    ],
    "parse" => function ($data): float {
      return floatval(str_replace('%', '', $data->VideoQuartile50Rate)) / 100;
    }
];
