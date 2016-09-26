<?php
return [
    "metric" => "activeviewmeasurability",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewMeasurability"
    ],
    "parse" => function ($data): float {
        return (float)$data->ActiveViewMeasurability;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->activeviewmeasurability;
            },
            0.0
        );
    }
];
