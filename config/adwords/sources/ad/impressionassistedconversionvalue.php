<?php
return [
    "metric" => "impressionassistedconversionvalue",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "ImpressionAssistedConversionValue"
    ],
    "parse" => function ($data): int {
        return (int)str_replace(',', '', $data->{'ImpressionAssistedConversionValue'});
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
