<?php
return [
    "metric" => "conversionvalue",
    "entity" => "Audience",
    "platform" => "adwords",
    "report" => "AUDIENCE_PERFORMANCE_REPORT",
    "fields" => [
        "ConversionValue"
    ],
    "parse" => function ($data): float {
        return (float)str_replace(',', '', $data->ConversionValue);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->conversionvalue;
            },
            0.0
        );
    }
];
