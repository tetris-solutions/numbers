<?php
return [
    "metric" => "costsignificance",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "CostSignificance"
    ],
    "parse" => function ($data): int {
      return (int)$data->CostSignificance;
    }
];
