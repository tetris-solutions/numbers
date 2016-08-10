<?php
return [
    "metric" => "contentranklostimpressionshare",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "ContentRankLostImpressionShare"
    ],
    "parse" => function ($data) {
        return $data->ContentRankLostImpressionShare;
    },
    "sum" => function (array $rows): float {
        // actual code goes here, ex:
        // return array_reduce(
        //     $rows,
        //     function (float $carry, \stdClass $row): float {
        //         return $carry + $row->contentranklostimpressionshare;
        //     },
        //     0.0
        // );
        return NULL;
    }
];
