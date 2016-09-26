<?php
return [
    "metric" => "activeviewctr",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewCtr"
    ],
    "parse" => function ($data): float {
        return (float)$data->ActiveViewCtr;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->activeviewctr;
            },
            0.0
        );
    }
];
