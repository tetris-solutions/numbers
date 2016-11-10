<?php
return [
    "metric" => "activeviewimpressions",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewImpressions"
    ],
    "parse" => function ($data): int {
        return (int)$data->ActiveViewImpressions;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->activeviewimpressions;
            },
            0.0
        );
    }
];
