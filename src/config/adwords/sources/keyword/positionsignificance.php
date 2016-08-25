<?php
return [
    "metric" => "positionsignificance",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "PositionSignificance"
    ],
    "parse" => function ($data): int {
        return (int)$data->PositionSignificance;
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
