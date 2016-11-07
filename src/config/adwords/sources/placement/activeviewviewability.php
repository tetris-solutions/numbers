<?php
return [
    "metric" => "activeviewviewability",
    "entity" => "Placement",
    "platform" => "adwords",
    "report" => "AUTOMATIC_PLACEMENTS_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewViewability"
    ],
    "parse" => function ($data): float {
        return (float)$data->ActiveViewViewability;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->activeviewviewability;
            },
            0.0
        );
    }
];
