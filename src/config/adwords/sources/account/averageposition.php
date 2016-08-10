<?php
return [
    "metric" => "averageposition",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "AveragePosition"
    ],
    "parse" => function ($data): int {
        return (int)$data->AveragePosition;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->averageposition;
            },
            0.0
        );
    }
];
