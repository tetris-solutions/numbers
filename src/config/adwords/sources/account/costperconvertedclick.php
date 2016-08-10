<?php
return [
    "metric" => "costperconvertedclick",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "CostPerConvertedClick"
    ],
    "parse" => function ($data): float {
        return (float)$data->CostPerConvertedClick;
    },
    "sum" => function (array $rows): float {
        // actual code goes here, ex:
        // return array_reduce(
        //     $rows,
        //     function (float $carry, \stdClass $row): float {
        //         return $carry + $row->costperconvertedclick;
        //     },
        //     0.0
        // );
        return NULL;
    }
];
