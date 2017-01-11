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
        return floatval(str_replace(',', '', $data->{'ImpressionAssistedConversionValue'}));
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
