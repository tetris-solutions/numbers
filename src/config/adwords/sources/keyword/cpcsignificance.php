<?php
return [
    "metric" => "cpcsignificance",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "CpcSignificance"
    ],
    "parse" => function ($data): float {
        return (float)$data->CpcSignificance;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->cpcsignificance;
            },
            0.0
        );
    }
];
