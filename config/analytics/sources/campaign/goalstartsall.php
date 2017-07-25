<?php
return [
    "metric" => "goalstartsall",
    "entity" => "Campaign",
    "fields" => [
        "ga:goalStartsAll"
    ],
    "report" => "GA_DEFAULT",
    "platform" => "analytics",
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ga:goalStartsAll'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'goalstartsall'};
            },
            0.0
        );
    }
];
