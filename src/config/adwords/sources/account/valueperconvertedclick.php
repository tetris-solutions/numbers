<?php
return [
    "metric" => "valueperconvertedclick",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "fields" => [
        "ValuePerConvertedClick"
    ],
    "parse" => function ($data): int {
        return (int)$data->ValuePerConvertedClick;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->valueperconvertedclick;
            },
            0.0
        );
    }
];
