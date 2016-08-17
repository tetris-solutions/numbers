<?php
return [
    "metric" => "cpmsignificance",
    "entity" => "Adgroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "CpmSignificance"
    ],
    "parse" => function ($data): int {
        return (int)$data->CpmSignificance;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->cpmsignificance;
            },
            0.0
        );
    }
];
