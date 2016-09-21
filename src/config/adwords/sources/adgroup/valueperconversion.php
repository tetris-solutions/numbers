<?php
return [
    "metric" => "valueperconversion",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "ValuePerConversion"
    ],
    "parse" => function ($data): int {
        return (int)$data->ValuePerConversion;
    },
    "inferred_from" => [
        "conversionvalue",
        "conversions"
    ],
    "sum" => function (array $rows) {
        $sumDividend = 0;
        $sumDivisor = 0;
        foreach ($rows as $row) {
            $sumDividend += $row->conversionvalue;
            $sumDivisor += $row->conversions;
        }
        return $sumDivisor !== 0
            ? $sumDividend / $sumDivisor
            : 0;
    }
];
