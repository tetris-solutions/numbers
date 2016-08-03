<?php
return [
    "metric" => "activeviewctr",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewCtr"
    ],
    "parse" => function ($data): int {
      return (int)$data->ActiveViewCtr;
    }
];
