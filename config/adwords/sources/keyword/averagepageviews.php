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
        return (float)str_replace(',', '', $data->AveragePageviews);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->averagepageviews;
            },
            0.0
        );
    }
];
