<?php
return [
    "metric" => "relativectr",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "RelativeCtr"
    ],
    "parse" => function ($data): int {
      return (int)$data->RelativeCtr;
    }
];
