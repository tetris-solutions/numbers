<?php
return [
    "metric" => "users",
    "entity" => "Campaign",
    "fields" => [
        "ga:users"
    ],
    "report" => "GA_DEFAULT",
    "platform" => "analytics",
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ga:users'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'users'};
            },
            0.0
        );
    }
];
