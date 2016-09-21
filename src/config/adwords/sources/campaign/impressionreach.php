<?php
return [
    "metric" => "impressionreach",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ImpressionReach"
    ],
    "parse" => function ($data) {
        return $data->ImpressionReach;
    },
    "sum" => NULL
];
