<?php
return [
    "metric" => "contentimpressionshare",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "ContentImpressionShare"
    ],
    "parse" => function ($data) {
      return $data->ContentImpressionShare;
    }
];
