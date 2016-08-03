<?php
return [
    "metric" => "videoviews",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "VideoViews"
    ],
    "parse" => function ($data): int {
      return (int)$data->VideoViews;
    }
];
