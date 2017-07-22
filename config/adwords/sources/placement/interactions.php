<?php
return [
    "metric" => "interactions",
    "entity" => "Placement",
    "fields" => [
        "Interactions"
    ],
    "report" => "AUTOMATIC_PLACEMENTS_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'Interactions'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'interactions'};
            },
            0.0
        );
    }
];
