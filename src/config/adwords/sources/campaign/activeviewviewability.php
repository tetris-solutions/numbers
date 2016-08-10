<?php
return [
    "metric" => "activeviewviewability",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewViewability"
    ],
    "parse" => function ($data): int {
        return (int)$data->ActiveViewViewability;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->activeviewviewability;
            },
            0.0
        );
    }
];
