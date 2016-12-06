<?php
return [
    "metric" => "cost",
    "entity" => "Placement",
    "platform" => "adwords",
    "report" => "AUTOMATIC_PLACEMENTS_PERFORMANCE_REPORT",
    "fields" => [
        "Cost"
    ],
    "parse" => function ($data): float {
        return (float)str_replace(',', '', $data->Cost);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->cost;
            },
            0.0
        );
    }
];
