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
    },
    "sum" => function (array $rows) {
        // actual code goes here, ex:
        // return array_reduce(
        //     $rows,
        //     function (float $carry, \stdClass $row): float {
        //         return $carry + $row->searchbudgetlostimpressionshare;
        //     },
        //     0.0
        // );
        return NULL;
    }
];
