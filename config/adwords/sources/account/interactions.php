<?php
return [
    "metric" => "interactions",
    "entity" => "Account",
    "fields" => [
        "Interactions"
    ],
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
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
