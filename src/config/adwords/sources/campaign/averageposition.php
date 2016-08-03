<?php
return [
    "metric" => "averageposition",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "AveragePosition"
    ],
    "parse" => function ($data): int {
      return (int)$data->AveragePosition;
    }
];
