<?php
return [
    "metric" => "impressionsignificance",
    "entity" => "Adgroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "ImpressionSignificance"
    ],
    "parse" => function ($data): int {
        return (int)$data->ImpressionSignificance;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->impressionsignificance;
            },
            0.0
        );
    }
];
