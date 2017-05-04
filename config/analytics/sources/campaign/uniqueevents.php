<?php
return [
    "metric" => "uniqueevents",
    "entity" => "Campaign",
    "platform" => "analytics",
    "report" => "GA_DEFAULT",
    "fields" => [
        "ga:uniqueEvents"
    ],
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
