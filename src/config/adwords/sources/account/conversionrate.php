<?php
return [
    "metric" => "conversionrate",
    "entity" => "Account",
    "platform" => "adwords",
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
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
        return $sumDivisor !== 0
            ? $sumDividend / $sumDivisor
            : 0;
    }
];
