<?php
return [
    "metric" => "clicks",
    "entity" => "Strategy",
    "platform" => "adwords",
    "report" => "BID_GOAL_PERFORMANCE_REPORT",
    "fields" => [
        "Clicks"
    ],
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'Clicks'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'clicks'};
            },
            0.0
        );
    }
];
