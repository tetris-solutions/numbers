<?php
return [
    "metric" => "clickconversionratesignificance",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ClickConversionRateSignificance"
    ],
    "parse" => function ($data): int {
      return (int)$data->ClickConversionRateSignificance;
    }
];
