<?php
return [
    "metric" => "interactions",
    "entity" => "Audience",
    "platform" => "adwords",
    "report" => "AUDIENCE_PERFORMANCE_REPORT",
    "fields" => [
        "Interactions"
    ],
    "parse" => function ($data): int {
        return (int)str_replace(',', '', $data->Interactions);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->interactions;
            },
            0.0
        );
    }
];
