<?php
return [
    "metric" => "averagecpc",
    "entity" => "Product",
    "fields" => [
        "AverageCpc"
    ],
    "inferred_from" => [
        "cost",
        "clicks"
    ],
    "report" => "SHOPPING_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'AverageCpc'}));
    },
    "sum" => function (array $rows) {
        $dividendMetric = 'cost';
        $divisorMetric = 'clicks';
    
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
