<?php
return [
    "metric" => "searchexactmatchimpressionshare",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "SearchExactMatchImpressionShare"
    ],
    "parse" => function ($data) {
        return $data->SearchExactMatchImpressionShare;
    },
    "sum" => NULL
];
