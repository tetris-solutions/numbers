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
    "sum" => function (array $rows): float {
        // actual code goes here, ex:
        // return array_reduce(
        //     $rows,
        //     function (float $carry, \stdClass $row): float {
        //         return $carry + $row->contentbudgetlostimpressionshare;
        //     },
        //     0.0
        // );
        return NULL;
    }
];
