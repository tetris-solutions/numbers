<?php
return [
    "metric" => "averagecost",
    "entity" => "Keyword",
    "fields" => [
        "AverageCost"
    ],
    "inferred_from" => [
        "cost",
        "interactions"
    ],
    "report" => "KEYWORDS_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'AverageCost'}));
    },
    "sum" => function (array $rows) {
        $dividendMetric = 'cost';
        $divisorMetric = 'interactions';
    
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
