<?php
return [
    "metric" => "searchranklostimpressionshare",
    "entity" => "Adgroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "SearchRankLostImpressionShare"
    ],
    "parse" => function ($data) {
        return $data->SearchRankLostImpressionShare;
    },
    "sum" => NULL
];
