<?php
return [
    "metric" => "averagetimeonsite",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "AverageTimeOnSite"
    ],
    "parse" => function ($data): int {
      return (int)$data->AverageTimeOnSite;
    }
];
