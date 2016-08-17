<?php
return [
    "metric" => "valueperconversion",
    "entity" => "Adgroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "ValuePerConversion"
    ],
    "parse" => function ($data): int {
        return (int)$data->ValuePerConversion;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->valueperconversion;
            },
            0.0
        );
    }
];
