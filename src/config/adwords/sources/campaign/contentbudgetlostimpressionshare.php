<?php
return [
    "metric" => "contentbudgetlostimpressionshare",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ContentBudgetLostImpressionShare"
    ],
    "parse" => function ($data) {
        return $data->ContentBudgetLostImpressionShare;
    },
    "sum" => NULL
];
