<?php
return [
    "metric" => "averagepageviews",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "AveragePageviews"
    ],
    "parse" => function ($data): float {
        return (float)$data->AveragePageviews;
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
