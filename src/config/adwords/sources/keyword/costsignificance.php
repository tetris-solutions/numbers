<?php
return [
    "metric" => "costsignificance",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "CostSignificance"
    ],
    "parse" => function ($data): int {
        return (int)$data->CostSignificance;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->costsignificance;
            },
            0.0
        );
    }
];
