<?php
return [
    "metric" => "goalstartsall",
    "entity" => "Campaign",
    "platform" => "analytics",
    "report" => "GA_DEFAULT",
    "fields" => [
        "ga:goalStartsAll"
    ],
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
