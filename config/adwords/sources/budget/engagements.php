<?php
return [
    "metric" => "engagements",
    "entity" => "Budget",
    "fields" => [
        "Engagements"
    ],
    "report" => "BUDGET_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'Engagements'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'engagements'};
            },
            0.0
        );
    }
];
