<?php
return [
    "metric" => "invalidclicks",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "InvalidClicks"
    ],
    "parse" => function ($data): int {
      return (int)$data->InvalidClicks;
    }
];
