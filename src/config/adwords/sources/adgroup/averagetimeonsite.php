<?php
return [
    "metric" => "averagetimeonsite",
    "entity" => "Adgroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "AverageTimeOnSite"
    ],
    "parse" => function ($data): int {
        return (int)$data->AverageTimeOnSite;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->averagetimeonsite;
            },
            0.0
        );
    }
];
