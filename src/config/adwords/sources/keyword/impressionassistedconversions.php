<?php
return [
    "metric" => "impressionassistedconversions",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "ImpressionAssistedConversions"
    ],
    "parse" => function ($data): int {
        return (int)$data->ImpressionAssistedConversions;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->impressionassistedconversions;
            },
            0.0
        );
    }
];
