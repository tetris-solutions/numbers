<?php
return [
    "metric" => "positionsignificance",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "PositionSignificance"
    ],
    "parse" => function ($data): float {
        return (float)$data->PositionSignificance;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->positionsignificance;
            },
            0.0
        );
    }
];
