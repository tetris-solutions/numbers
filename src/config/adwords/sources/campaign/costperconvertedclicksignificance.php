<?php
return [
    "metric" => "costperconvertedclicksignificance",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "CostPerConvertedClickSignificance"
    ],
    "parse" => function ($data): int {
      return (int)$data->CostPerConvertedClickSignificance;
    }
];
