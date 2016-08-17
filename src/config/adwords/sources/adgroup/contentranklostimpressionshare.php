<?php
return [
    "metric" => "contentranklostimpressionshare",
    "entity" => "Adgroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "ContentRankLostImpressionShare"
    ],
    "parse" => function ($data) {
        return $data->ContentRankLostImpressionShare;
    },
    "sum" => NULL
];
