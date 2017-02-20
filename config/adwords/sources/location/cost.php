<?php
return [
    "metric" => "cost",
    "entity" => "Location",
    "platform" => "adwords",
    "report" => "GEO_PERFORMANCE_REPORT",
    "fields" => [
        "Cost"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'Cost'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'cost'};
            },
            0.0
        );
    }
];
