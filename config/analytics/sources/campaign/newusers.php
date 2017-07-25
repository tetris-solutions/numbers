<?php
return [
    "metric" => "newusers",
    "entity" => "Campaign",
    "fields" => [
        "ga:newUsers"
    ],
    "report" => "GA_DEFAULT",
    "platform" => "analytics",
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ga:newUsers'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'newusers'};
            },
            0.0
        );
    }
];
