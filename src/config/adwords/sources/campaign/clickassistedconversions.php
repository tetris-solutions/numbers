<?php
return [
    "metric" => "clickassistedconversions",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ClickAssistedConversions"
    ],
    "parse" => function ($data): int {
      return (int)$data->ClickAssistedConversions;
    }
];
