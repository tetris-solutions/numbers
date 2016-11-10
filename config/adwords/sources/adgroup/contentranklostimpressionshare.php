<?php
return [
    "metric" => "contentranklostimpressionshare",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "ContentRankLostImpressionShare"
    ],
    "parse" => function ($data) {
        return $data->ContentRankLostImpressionShare;
    }
];
