<?php
return [
    "metric" => "averageposition",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "AveragePosition"
    ],
    "parse" => function ($data): float {
        return (float)$data->AveragePosition;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->averageposition;
            },
            0.0
        );
    }
];
