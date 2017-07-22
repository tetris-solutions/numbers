<?php
return [
    "metric" => "valueperconversion",
    "entity" => "Search",
    "fields" => [
        "ValuePerConversion"
    ],
    "inferred_from" => [
        "conversionvalue",
        "conversions"
    ],
    "report" => "SEARCH_QUERY_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ValuePerConversion'}));
    },
    "sum" => function (array $rows) {
        $dividendMetric = 'conversionvalue';
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
