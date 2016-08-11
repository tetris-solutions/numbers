<?php
return [
    "metric" => "contentimpressionshare",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ContentImpressionShare"
    ],
    "parse" => function ($data) {
        return $data->ContentImpressionShare;
    },
    "sum" => NULL
];
