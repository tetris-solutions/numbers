<?php
return [
    "metric" => "averagecpv",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "AverageCpv"
    ],
    "parse" => function ($data): int {
      return (int)$data->AverageCpv;
    }
];
