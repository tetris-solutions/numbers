<?php
return [
    "metric" => "uniqueevents",
    "entity" => "Campaign",
    "fields" => [
        "ga:uniqueEvents"
    ],
    "report" => "GA_DEFAULT",
    "platform" => "analytics",
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ga:uniqueEvents'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'uniqueevents'};
            },
            0.0
        );
    }
];
