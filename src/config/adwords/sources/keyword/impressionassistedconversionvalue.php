<?php
return [
    "metric" => "impressionassistedconversionvalue",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "ImpressionAssistedConversionValue"
    ],
    "parse" => function ($data): int {
        return (int)$data->ImpressionAssistedConversionValue;
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
