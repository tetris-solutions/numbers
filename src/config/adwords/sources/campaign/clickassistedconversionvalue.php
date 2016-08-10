<?php
return [
    "metric" => "clickassistedconversionvalue",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ClickAssistedConversionValue"
    ],
    "parse" => function ($data): int {
        return (int)$data->ClickAssistedConversionValue;
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
