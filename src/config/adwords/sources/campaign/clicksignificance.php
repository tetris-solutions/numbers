<?php
return [
    "metric" => "clicksignificance",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ClickSignificance"
    ],
    "parse" => function ($data): int {
      return (int)$data->ClickSignificance;
    }
];
