<?php
return [
    "metric" => "interactiontypes",
    "entity" => "Budget",
    "platform" => "adwords",
    "report" => "BUDGET_PERFORMANCE_REPORT",
    "fields" => [
        "InteractionTypes"
    ],
    "parse" => function ($data): float {
        return (float)$data->InteractionTypes;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->interactiontypes;
            },
            0.0
        );
    }
];
