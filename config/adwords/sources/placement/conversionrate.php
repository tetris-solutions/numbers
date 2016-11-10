<?php
return [
    "metric" => "conversionrate",
    "entity" => "Placement",
    "platform" => "adwords",
    "report" => "AUTOMATIC_PLACEMENTS_PERFORMANCE_REPORT",
    "fields" => [
        "ConversionRate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->ConversionRate)) / 100;
    },
    "inferred_from" => [
        "conversions",
        "clicks"
    ],
    "sum" => function (array $rows) {
        $sumDividend = 0;
        $sumDivisor = 0;
        foreach ($rows as $row) {
            $sumDividend += $row->conversions;
            $sumDivisor += $row->clicks;
        }
        return (float)$sumDivisor !== 0.0
            ? $sumDividend / $sumDivisor
            : 0;
    }
];
