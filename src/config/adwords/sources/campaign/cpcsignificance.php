<?php
return [
    "metric" => "cpcsignificance",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "CpcSignificance"
    ],
    "parse" => function ($data): int {
      return (int)$data->CpcSignificance;
    }
];
