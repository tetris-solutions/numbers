<?php
return [
    "metric" => "activeviewmeasurability",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewMeasurability"
    ],
    "parse" => function ($data): int {
        return (int)$data->ActiveViewMeasurability;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->activeviewmeasurability;
            },
            0.0
        );
    }
];
