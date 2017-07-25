<?php
return [
    "metric" => "goalcompletionsall",
    "entity" => "Campaign",
    "fields" => [
        "ga:goalCompletionsAll"
    ],
    "report" => "GA_DEFAULT",
    "platform" => "analytics",
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ga:goalCompletionsAll'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'goalcompletionsall'};
            },
            0.0
        );
    }
];
