<?php
return [
    "metric" => "averagecpe",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "AverageCpe"
    ],
    "parse" => function ($data): int {
      return (int)$data->AverageCpe;
    }
];
