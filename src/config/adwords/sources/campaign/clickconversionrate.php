<?php
return [
    "metric" => "clickconversionrate",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ClickConversionRate"
    ],
    "parse" => function ($data): float {
      return floatval(str_replace('%', '', $data->ClickConversionRate)) / 100;
    }
];
