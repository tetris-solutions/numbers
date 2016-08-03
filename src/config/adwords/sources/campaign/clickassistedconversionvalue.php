<?php
return [
    "metric" => "clickassistedconversionvalue",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ClickAssistedConversionValue"
    ],
    "parse" => function ($data): int {
      return (int)$data->ClickAssistedConversionValue;
    }
];
