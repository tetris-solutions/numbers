<?php
return [
    "metric" => "contentbudgetlostimpressionshare",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "ContentBudgetLostImpressionShare"
    ],
    "parse" => function ($data) {
      return $data->ContentBudgetLostImpressionShare;
    }
];
