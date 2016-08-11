<?php
return [
    "metric" => "searchimpressionshare",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "SearchImpressionShare"
    ],
    "parse" => function ($data) {
        return $data->SearchImpressionShare;
    },
    "sum" => function (array $rows) {
        // actual code goes here, ex:
        // return array_reduce(
        //     $rows,
        //     function (float $carry, \stdClass $row): float {
        //         return $carry + $row->searchimpressionshare;
        //     },
        //     0.0
        // );
        return NULL;
    }
];
