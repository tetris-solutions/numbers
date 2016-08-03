<?php
return [
    "metric" => "valueperconvertedclick",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ValuePerConvertedClick"
    ],
    "parse" => function ($data): int {
      return (int)$data->ValuePerConvertedClick;
    }
];
