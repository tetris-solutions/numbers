<?php
return [
    "metric" => "searchexactmatchimpressionshare",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "SearchExactMatchImpressionShare"
    ],
    "parse" => function ($data) {
        return $data->SearchExactMatchImpressionShare;
    },
    "sum" => NULL
];
