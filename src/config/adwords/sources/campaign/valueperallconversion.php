<?php
return [
    "metric" => "valueperallconversion",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ValuePerAllConversion"
    ],
    "parse" => function ($data): int {
      return (int)$data->ValuePerAllConversion;
    }
];
