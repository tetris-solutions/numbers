<?php
return [
    "metric" => "invalidclickrate",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "InvalidClickRate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->InvalidClickRate)) / 100;
    },
    "sum" => function (array $rows) {
        // actual code goes here, ex:
        // return array_reduce(
        //     $rows,
        //     function (float $carry, \stdClass $row): float {
        //         return $carry + $row->invalidclickrate;
        //     },
        //     0.0
        // );
        return NULL;
    }
];
