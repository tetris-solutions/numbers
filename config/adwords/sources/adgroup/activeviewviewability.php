<?php
return [
    "metric" => "activeviewviewability",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewViewability"
    ],
    "parse" => function ($data): float {
        return (float)str_replace(',', '', $data->ActiveViewViewability);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->activeviewviewability;
            },
            0.0
        );
    }
];
