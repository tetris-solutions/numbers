<?php
return [
    "metric" => "costperconversion",
    "entity" => "Query",
    "platform" => "adwords",
    "report" => "KEYWORDLESS_QUERY_REPORT",
    "fields" => [
        "CostPerConversion"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'CostPerConversion'}));
    },
    "inferred_from" => [
        "cost",
        "conversions"
    ],
    "sum" => function (array $rows) {
        $dividendMetric = 'cost';
        $divisorMetric = 'conversions';
    
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
