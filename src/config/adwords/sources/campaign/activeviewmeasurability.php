<?php
return [
    "metric" => "activeviewmeasurability",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewMeasurability"
    ],
    "parse" => function ($data): int {
      return (int)$data->ActiveViewMeasurability;
    }
];
