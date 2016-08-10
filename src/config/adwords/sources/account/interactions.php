<?php
return [
    "metric" => "interactions",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "Interactions"
    ],
    "parse" => function ($data): int {
        return (int)$data->Interactions;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->interactions;
            },
            0.0
        );
    }
];
