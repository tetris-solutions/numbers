<?php
return [
    "metric" => "contentimpressionshare",
    "entity" => "Adgroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "ContentImpressionShare"
    ],
    "parse" => function ($data) {
        return $data->ContentImpressionShare;
    },
    "sum" => NULL
];
