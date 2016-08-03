<?php
return [
    "metric" => "gmailsecondaryclicks",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "GmailSecondaryClicks"
    ],
    "parse" => function ($data): int {
      return (int)$data->GmailSecondaryClicks;
    }
];
