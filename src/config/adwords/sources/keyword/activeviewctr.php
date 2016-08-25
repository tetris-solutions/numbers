<?php
return [
    "metric" => "activeviewctr",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewCtr"
    ],
    "parse" => function ($data): int {
        return (int)$data->ActiveViewCtr;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->activeviewctr;
            },
            0.0
        );
    }
];
