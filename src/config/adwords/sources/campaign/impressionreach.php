<?php
return [
    "metric" => "impressionreach",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ImpressionReach"
    ],
    "parse" => function ($data) {
        return $data->ImpressionReach;
    },
    "sum" => function (array $rows): float {
        // actual code goes here, ex:
        // return array_reduce(
        //     $rows,
        //     function (float $carry, \stdClass $row): float {
        //         return $carry + $row->impressionreach;
        //     },
        //     0.0
        // );
        return NULL;
    }
];
