<?php
return [
    "metric" => "positionsignificance",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "PositionSignificance"
    ],
    "parse" => function ($data): int {
      return (int)$data->PositionSignificance;
    }
];
