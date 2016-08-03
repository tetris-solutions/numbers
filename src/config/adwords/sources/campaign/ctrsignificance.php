<?php
return [
    "metric" => "ctrsignificance",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "CtrSignificance"
    ],
    "parse" => function ($data): int {
      return (int)$data->CtrSignificance;
    }
];
