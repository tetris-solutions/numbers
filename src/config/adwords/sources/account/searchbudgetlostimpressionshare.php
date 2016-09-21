<?php
return [
    "metric" => "searchbudgetlostimpressionshare",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "SearchBudgetLostImpressionShare"
    ],
    "parse" => function ($data) {
        return $data->SearchBudgetLostImpressionShare;
    }
];
