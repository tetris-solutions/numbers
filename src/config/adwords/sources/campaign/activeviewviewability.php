<?php
return [
    "metric" => "activeviewviewability",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewViewability"
    ],
    "parse" => function ($data): int {
      return (int)$data->ActiveViewViewability;
    }
];
