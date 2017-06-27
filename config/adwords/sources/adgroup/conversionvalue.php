<?php
return [
    "metric" => "conversionvalue",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "KEYWORDLESS_QUERY_REPORT",
    "fields" => [
        "ConversionValue"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ConversionValue'}));
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
