<?php
return [
    "metric" => "invalidclicks",
    "entity" => "Account",
    "fields" => [
        "InvalidClicks"
    ],
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'InvalidClicks'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'invalidclicks'};
            },
            0.0
        );
    }
];
