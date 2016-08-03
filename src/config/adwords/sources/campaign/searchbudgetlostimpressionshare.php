<?php
return [
    "metric" => "searchbudgetlostimpressionshare",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "SearchBudgetLostImpressionShare"
    ],
    "parse" => function ($data) {
      return $data->SearchBudgetLostImpressionShare;
    }
];
