<?php
return [
    "metric" => "valueperallconversion",
    "entity" => "Keyword",
    "platform" => "adwords",
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "fields" => [
        "ValuePerAllConversion"
    ],
    "parse" => function ($data): float {
        return (float)$data->ValuePerAllConversion;
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
        return (float)$sumDivisor !== 0.0
            ? $sumDividend / $sumDivisor
            : 0;
    }
];
