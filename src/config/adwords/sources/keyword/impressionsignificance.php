<?php
return [
    "metric" => "impressionsignificance",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "ImpressionSignificance"
    ],
    "parse" => function ($data): float {
        return (float)$data->ImpressionSignificance;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->impressionsignificance;
            },
            0.0
        );
    }
];
