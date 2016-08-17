<?php
return [
    "metric" => "averagepageviews",
    "entity" => "Adgroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "AveragePageviews"
    ],
    "parse" => function ($data): int {
        return (int)$data->AveragePageviews;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->averagepageviews;
            },
            0.0
        );
    }
];
