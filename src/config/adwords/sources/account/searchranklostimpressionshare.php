<?php
return [
    "metric" => "searchranklostimpressionshare",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "SearchRankLostImpressionShare"
    ],
    "parse" => function ($data) {
        return $data->SearchRankLostImpressionShare;
    }
];
