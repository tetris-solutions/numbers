<?php
return [
    "metric" => "cpmsignificance",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "CpmSignificance"
    ],
    "parse" => function ($data): int {
      return (int)$data->CpmSignificance;
    }
];
