<?php
return [
    "metric" => "searchimpressionshare",
    "entity" => "Adgroup",
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
