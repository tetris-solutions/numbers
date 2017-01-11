<?php
return [
    "metric" => "allconversionvalue",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "AllConversionValue"
    ],
    "parse" => function ($data): float {
        return (float)str_replace(',', '', $data->AllConversionValue);
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'allconversionvalue'};
            },
            0.0
        );
    }
];
