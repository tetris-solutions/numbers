<?php
return [
    "metric" => "gmailsaves",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "GmailSaves"
    ],
    "parse" => function ($data): int {
      return (int)$data->GmailSaves;
    }
];
