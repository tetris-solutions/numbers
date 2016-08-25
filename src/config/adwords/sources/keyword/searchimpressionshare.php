<?php
return [
    "metric" => "searchimpressionshare",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "SearchImpressionShare"
    ],
    "parse" => function ($data) {
        return $data->SearchImpressionShare;
    },
    "sum" => NULL
];
