<?php
return [
    "metric" => "allconversionvalue",
    "entity" => "Partition",
    "fields" => [
        "AllConversionValue"
    ],
    "report" => "PRODUCT_PARTITION_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'AllConversionValue'}));
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
