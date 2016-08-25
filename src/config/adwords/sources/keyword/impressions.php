<?php
return [
    "metric" => "impressions",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "Impressions"
    ],
    "parse" => function ($data): int {
        return (int)$data->Impressions;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->impressions;
            },
            0.0
        );
    }
];
