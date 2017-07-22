<?php
return [
    "metric" => "clickassistedconversionvalue",
    "entity" => "AdGroup",
    "fields" => [
        "ClickAssistedConversionValue"
    ],
    "report" => "ADGROUP_PERFORMANCE_REPORT",
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
