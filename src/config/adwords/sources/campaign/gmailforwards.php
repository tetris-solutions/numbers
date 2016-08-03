<?php
return [
    "metric" => "gmailforwards",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "GmailForwards"
    ],
    "parse" => function ($data): int {
      return (int)$data->GmailForwards;
    }
];
