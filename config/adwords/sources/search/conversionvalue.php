<?php
return [
    "metric" => "conversionvalue",
    "entity" => "Search",
    "platform" => "adwords",
    "report" => "SEARCH_QUERY_PERFORMANCE_REPORT",
    "fields" => [
        "ConversionValue"
    ],
    "parse" => function ($data): float {
        return (float)str_replace(',', '', $data->ConversionValue);
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
