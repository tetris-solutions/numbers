<?php
return [
    "metric" => "relativectr",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "RelativeCtr"
    ],
    "parse" => function ($data): int {
        return (int)$data->RelativeCtr;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->relativectr;
            },
            0.0
        );
    }
];
