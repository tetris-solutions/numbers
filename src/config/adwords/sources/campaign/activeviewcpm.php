<?php
return [
    "metric" => "activeviewcpm",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewCpm"
    ],
    "parse" => function ($data): float {
      return (float)$data->ActiveViewCpm;
    }
];
