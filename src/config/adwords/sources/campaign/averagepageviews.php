<?php
return [
    "metric" => "averagepageviews",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "AveragePageviews"
    ],
    "parse" => function ($data): int {
        return (int)$data->AveragePageviews;
    },
    "sum" => NULL
];
