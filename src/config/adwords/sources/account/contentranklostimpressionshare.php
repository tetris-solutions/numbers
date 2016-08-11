<?php
return [
    "metric" => "contentranklostimpressionshare",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "ContentRankLostImpressionShare"
    ],
    "parse" => function ($data) {
        return $data->ContentRankLostImpressionShare;
    },
    "sum" => NULL
];
