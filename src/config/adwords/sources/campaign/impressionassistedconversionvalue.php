<?php
return [
    "metric" => "impressionassistedconversionvalue",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ImpressionAssistedConversionValue"
    ],
    "parse" => function ($data): int {
      return (int)$data->ImpressionAssistedConversionValue;
    }
];
