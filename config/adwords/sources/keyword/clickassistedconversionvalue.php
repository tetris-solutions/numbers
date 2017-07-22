<?php
return [
    "metric" => "clickassistedconversionvalue",
    "entity" => "Keyword",
    "fields" => [
        "ClickAssistedConversionValue"
    ],
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ClickAssistedConversionValue'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'clickassistedconversionvalue'};
            },
            0.0
        );
    }
];
