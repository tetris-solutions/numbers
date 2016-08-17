<?php
return [
    "metric" => "conversionvalue",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "ConversionValue"
    ],
    "parse" => function ($data): int {
        return (int)$data->ConversionValue;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->conversionvalue;
            },
            0.0
        );
    }
];
