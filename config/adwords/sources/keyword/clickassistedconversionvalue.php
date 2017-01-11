<?php
return [
    "metric" => "clickassistedconversionvalue",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "ClickAssistedConversionValue"
    ],
    "parse" => function ($data): float {
        return (float)str_replace(',', '', $data->ClickAssistedConversionValue);
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
