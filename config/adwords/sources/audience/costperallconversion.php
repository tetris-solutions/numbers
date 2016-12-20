<?php
return [
    "metric" => "costperallconversion",
    "entity" => "Audience",
    "platform" => "adwords",
    "report" => "AUDIENCE_PERFORMANCE_REPORT",
    "fields" => [
        "CostPerAllConversion"
    ],
    "parse" => function ($data): float {
        return (float)str_replace(',', '', $data->CostPerAllConversion);
    },
    "inferred_from" => [
        "cost",
        "allconversions"
    ],
    "sum" => function (array $rows) {
        $sumDividend = 0;
        $sumDivisor = 0;
        foreach ($rows as $row) {
            $sumDividend += $row->cost;
            $sumDivisor += $row->allconversions;
        }
        return (float)$sumDivisor !== 0.0
            ? $sumDividend / $sumDivisor
            : 0;
    }
];
