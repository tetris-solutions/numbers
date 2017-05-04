<?php
return [
    "metric" => "bounces",
    "entity" => "Campaign",
    "platform" => "analytics",
    "report" => "GA_DEFAULT",
    "fields" => [
        "ga:bounces"
    ],
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ga:bounces'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'bounces'};
            },
            0.0
        );
    }
];
