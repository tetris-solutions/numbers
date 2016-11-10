<?php
return [
    "metric" => "allconversionvalue",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "AllConversionValue"
    ],
    "parse" => function ($data): float {
        return (float)$data->AllConversionValue;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->allconversionvalue;
            },
            0.0
        );
    }
];
