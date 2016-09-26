<?php
return [
    "metric" => "clickassistedconversionvalue",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "ClickAssistedConversionValue"
    ],
    "parse" => function ($data): float {
        return (float)$data->ClickAssistedConversionValue;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->clickassistedconversionvalue;
            },
            0.0
        );
    }
];
