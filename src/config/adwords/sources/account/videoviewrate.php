<?php
return [
    "metric" => "videoviewrate",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "VideoViewRate"
    ],
    "parse" => function ($data): float {
      return floatval(str_replace('%', '', $data->VideoViewRate)) / 100;
    }
];
