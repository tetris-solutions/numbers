<?php
return [
    "metric" => "clickassistedconversionvalue",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "ClickAssistedConversionValue"
    ],
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
