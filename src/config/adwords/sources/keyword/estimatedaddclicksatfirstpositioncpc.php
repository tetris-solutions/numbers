<?php
return [
    "metric" => "estimatedaddclicksatfirstpositioncpc",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "EstimatedAddClicksAtFirstPositionCpc"
    ],
    "parse" => function ($data): int {
        return (int)$data->EstimatedAddClicksAtFirstPositionCpc;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->estimatedaddclicksatfirstpositioncpc;
            },
            0.0
        );
    }
];
