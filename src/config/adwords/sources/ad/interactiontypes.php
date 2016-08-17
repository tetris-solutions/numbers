<?php
return [
    "metric" => "interactiontypes",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "InteractionTypes"
    ],
    "parse" => function ($data): int {
        return (int)$data->InteractionTypes;
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
