<?php
return [
    "metric" => "valueperallconversion",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "ValuePerAllConversion"
    ],
    "parse" => function ($data): int {
        return (int)$data->ValuePerAllConversion;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->valueperallconversion;
            },
            0.0
        );
    }
];
