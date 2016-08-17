<?php
return [
    "metric" => "searchimpressionshare",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "SearchImpressionShare"
    ],
    "parse" => function ($data) {
        return $data->SearchImpressionShare;
    },
    "sum" => NULL
];
