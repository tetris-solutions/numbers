<?php
return [
    "metric" => "engagements",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "Engagements"
    ],
    "parse" => function ($data): int {
        return (int)$data->Engagements;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->engagements;
            },
            0.0
        );
    }
];
