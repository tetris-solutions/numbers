<?php
return [
    "metric" => "allconversionvalue",
    "entity" => "Category",
    "platform" => "adwords",
    "report" => "KEYWORDLESS_CATEGORY_REPORT",
    "fields" => [
        "AllConversionValue"
    ],
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
