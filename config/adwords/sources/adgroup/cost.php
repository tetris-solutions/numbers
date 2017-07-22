<?php
return [
    "metric" => "cost",
    "entity" => "AdGroup",
    "fields" => [
        "Cost"
    ],
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "platform" => "adwords",
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
