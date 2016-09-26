<?php
return [
    "metric" => "conversions",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "Conversions"
    ],
    "parse" => function ($data): float {
        return (float)$data->Conversions;
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
