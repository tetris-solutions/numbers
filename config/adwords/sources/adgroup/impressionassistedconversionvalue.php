<?php
return [
    "metric" => "impressionassistedconversionvalue",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "ImpressionAssistedConversionValue"
    ],
    "parse" => function ($data): float {
        return (float)str_replace(',', '', $data->ImpressionAssistedConversionValue);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->impressionassistedconversionvalue;
            },
            0.0
        );
    }
];
