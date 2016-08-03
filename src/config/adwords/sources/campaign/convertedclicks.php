<?php
return [
    "metric" => "convertedclicks",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ConvertedClicks"
    ],
    "parse" => function ($data): int {
      return (int)$data->ConvertedClicks;
    }
];
