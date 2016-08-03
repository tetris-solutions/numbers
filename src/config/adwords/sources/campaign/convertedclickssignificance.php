<?php
return [
    "metric" => "convertedclickssignificance",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ConvertedClicksSignificance"
    ],
    "parse" => function ($data): int {
      return (int)$data->ConvertedClicksSignificance;
    }
];
