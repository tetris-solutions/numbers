<?php
return [
    "metric" => "users",
    "entity" => "Campaign",
    "platform" => "analytics",
    "report" => "GA_DEFAULT",
    "fields" => [
        "ga:users"
    ],
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
