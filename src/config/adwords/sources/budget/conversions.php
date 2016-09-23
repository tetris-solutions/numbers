<?php
return [
    "metric" => "conversions",
    "entity" => "Budget",
    "platform" => "adwords",
    "report" => "BUDGET_PERFORMANCE_REPORT",
    "fields" => [
        "Conversions"
    ],
    "parse" => function ($data): int {
        return (int)$data->Conversions;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->conversions;
            },
            0.0
        );
    }
];
