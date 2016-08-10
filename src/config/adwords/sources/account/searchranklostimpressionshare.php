<?php
return [
    "metric" => "searchranklostimpressionshare",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "SearchRankLostImpressionShare"
    ],
    "parse" => function ($data) {
        return $data->SearchRankLostImpressionShare;
    },
    "sum" => function (array $rows): float {
        // actual code goes here, ex:
        // return array_reduce(
        //     $rows,
        //     function (float $carry, \stdClass $row): float {
        //         return $carry + $row->searchranklostimpressionshare;
        //     },
        //     0.0
        // );
        return NULL;
    }
];
