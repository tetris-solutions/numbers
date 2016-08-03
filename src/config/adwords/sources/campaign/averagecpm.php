<?php
return [
    "metric" => "averagecpm",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "AverageCpm"
    ],
    "parse" => function ($data): float {
      return (float)$data->AverageCpm;
    }
];
