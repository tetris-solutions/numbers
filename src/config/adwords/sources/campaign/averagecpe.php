<?php
return [
    "metric" => "averagecpe",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "AverageCpe"
    ],
    "parse" => function ($data): int {
        return (int)$data->AverageCpe;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->averagecpe;
            },
            0.0
        );
    }
];
