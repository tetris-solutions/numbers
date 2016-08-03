<?php
return [
    "metric" => "averagefrequency",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "AverageFrequency"
    ],
    "parse" => function ($data): int {
      return (int)$data->AverageFrequency;
    }
];
