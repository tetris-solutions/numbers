<?php
return [
    "metric" => "ctrsignificance",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "CtrSignificance"
    ],
    "parse" => function ($data): float {
        return (float)$data->CtrSignificance;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->ctrsignificance;
            },
            0.0
        );
    }
];
