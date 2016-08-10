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
    },
    "sum" => function (array $rows): float {
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
