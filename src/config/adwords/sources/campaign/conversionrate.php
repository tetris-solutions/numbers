<?php
return [
    "metric" => "conversionrate",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ConversionRate"
    ],
    "parse" => function ($data): float {
      return floatval(str_replace('%', '', $data->ConversionRate)) / 100;
    }
];
