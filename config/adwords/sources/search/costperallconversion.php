<?php
return [
    "metric" => "costperallconversion",
    "entity" => "Search",
    "fields" => [
        "CostPerAllConversion"
    ],
    "inferred_from" => [
        "cost",
        "allconversions"
    ],
    "report" => "SEARCH_QUERY_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'CostPerAllConversion'}));
    },
    "sum" => function (array $rows) {
        $dividendMetric = 'cost';
        $divisorMetric = 'allconversions';
    
        $sumDividend = 0;
        $sumDivisor = 0;
    
        foreach ($rows as $row) {
            $sumDividend += $row->{$dividendMetric};
            $sumDivisor += $row->{$divisorMetric};
        }
    
        return (float)$sumDivisor !== 0.0
            ? $sumDividend / $sumDivisor
            : 0;
    }
];
