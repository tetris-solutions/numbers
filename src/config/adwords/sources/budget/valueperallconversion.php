<?php
return [
    "metric" => "valueperallconversion",
    "entity" => "Budget",
    "platform" => "adwords",
    "report" => "BUDGET_PERFORMANCE_REPORT",
    "fields" => [
        "ValuePerAllConversion"
    ],
    "parse" => function ($data): int {
        return (int)$data->ValuePerAllConversion;
    },
    "inferred_from" => [
        "allconversionvalue",
        "allconversions"
    ],
    "sum" => function (array $rows) {
        $sumDividend = 0;
        $sumDivisor = 0;
        foreach ($rows as $row) {
            $sumDividend += $row->allconversionvalue;
            $sumDivisor += $row->allconversions;
        }
        return $sumDivisor !== 0
            ? $sumDividend / $sumDivisor
            : 0;
    }
];
