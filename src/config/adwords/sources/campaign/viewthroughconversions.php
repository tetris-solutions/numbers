<?php
return [
    "metric" => "viewthroughconversions",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ViewThroughConversions"
    ],
    "parse" => function ($data): int {
      return (int)$data->ViewThroughConversions;
    }
];
