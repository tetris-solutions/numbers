<?php
return [
    "metric" => "invalidclicks",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "InvalidClicks"
    ],
    "parse" => function ($data): int {
        return (int)$data->InvalidClicks;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->invalidclicks;
            },
            0.0
        );
    }
];
