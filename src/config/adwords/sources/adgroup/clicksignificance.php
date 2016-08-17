<?php
return [
    "metric" => "clicksignificance",
    "entity" => "Adgroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "ClickSignificance"
    ],
    "parse" => function ($data): int {
        return (int)$data->ClickSignificance;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->clicksignificance;
            },
            0.0
        );
    }
];
