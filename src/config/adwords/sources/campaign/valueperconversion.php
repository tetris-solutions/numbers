<?php
return [
    "metric" => "valueperconversion",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ValuePerConversion"
    ],
    "parse" => function ($data): int {
      return (int)$data->ValuePerConversion;
    }
];
