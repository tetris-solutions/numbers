<?php
return [
    "metric" => "allconversionvalue",
    "entity" => "Adgroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "AllConversionValue"
    ],
    "parse" => function ($data): int {
        return (int)$data->AllConversionValue;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->allconversionvalue;
            },
            0.0
        );
    }
];
