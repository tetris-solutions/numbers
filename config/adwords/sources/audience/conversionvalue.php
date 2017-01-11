<?php
return [
    "metric" => "conversionvalue",
    "entity" => "Audience",
    "platform" => "adwords",
    "report" => "AUDIENCE_PERFORMANCE_REPORT",
    "fields" => [
        "ConversionValue"
    ],
    "parse" => function ($data): int {
        return (int)str_replace(',', '', $data->{'ConversionValue'});
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'conversionvalue'};
            },
            0.0
        );
    }
];
