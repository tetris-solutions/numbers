<?php
return [
    "metric" => "conversionvalue",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ConversionValue"
    ],
    "parse" => function ($data): float {
        return (float)$data->ConversionValue;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->conversionvalue;
            },
            0.0
        );
    }
];
