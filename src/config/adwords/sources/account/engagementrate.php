<?php
return [
    "metric" => "engagementrate",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "EngagementRate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->EngagementRate)) / 100;
    },
    "sum" => function (array $rows): float {
        // actual code goes here, ex:
        // return array_reduce(
        //     $rows,
        //     function (float $carry, \stdClass $row): float {
        //         return $carry + $row->engagementrate;
        //     },
        //     0.0
        // );
        return NULL;
    }
];
