<?php
return [
    "metric" => "impressionassistedconversions",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ImpressionAssistedConversions"
    ],
    "parse" => function ($data): int {
      return (int)$data->ImpressionAssistedConversions;
    }
];
