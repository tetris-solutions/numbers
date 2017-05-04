<?php
return [
    "metric" => "totalevents",
    "entity" => "Campaign",
    "platform" => "analytics",
    "report" => "GA_DEFAULT",
    "fields" => [
        "ga:totalEvents"
    ],
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ga:totalEvents'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'totalevents'};
            },
            0.0
        );
    }
];
