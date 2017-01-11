<?php
return [
    "metric" => "impressionassistedconversionvalue",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "ImpressionAssistedConversionValue"
    ],
    "parse" => function ($data): float {
        return (float)str_replace(',', '', $data->ImpressionAssistedConversionValue);
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'impressionassistedconversionvalue'};
            },
            0.0
        );
    }
];
