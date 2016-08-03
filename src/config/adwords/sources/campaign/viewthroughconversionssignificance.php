<?php
return [
    "metric" => "viewthroughconversionssignificance",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ViewThroughConversionsSignificance"
    ],
    "parse" => function ($data): int {
      return (int)$data->ViewThroughConversionsSignificance;
    }
];
