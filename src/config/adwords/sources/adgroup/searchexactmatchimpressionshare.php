<?php
return [
    "metric" => "searchexactmatchimpressionshare",
    "entity" => "Adgroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "SearchExactMatchImpressionShare"
    ],
    "parse" => function ($data) {
        return $data->SearchExactMatchImpressionShare;
    },
    "sum" => NULL
];
