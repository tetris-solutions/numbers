<?php
return [
    "metric" => "videoviews",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "VideoViews"
    ],
    "parse" => function ($data): int {
        return (int)$data->VideoViews;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->videoviews;
            },
            0.0
        );
    }
];
