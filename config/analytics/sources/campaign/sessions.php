<?php
return [
    "metric" => "sessions",
    "entity" => "Campaign",
    "fields" => [
        "ga:sessions"
    ],
    "report" => "GA_DEFAULT",
    "platform" => "analytics",
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ga:sessions'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'sessions'};
            },
            0.0
        );
    }
];
