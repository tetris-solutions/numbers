<?php
return [
    "metric" => "averagecpv",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "AverageCpv"
    ],
    "parse" => function ($data): int {
        return (int)$data->AverageCpv;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->averagecpv;
            },
            0.0
        );
    }
];
