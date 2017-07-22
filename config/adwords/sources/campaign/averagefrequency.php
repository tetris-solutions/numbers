<?php
return [
    "metric" => "averagefrequency",
    "entity" => "Campaign",
    "fields" => [
        "AverageFrequency"
    ],
    "inferred_from" => [
        "impressions",
        "impressionreach"
    ],
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'AverageFrequency'}));
    },
    "sum" => function (array $rows) {
        $dividendMetric = 'impressions';
        $divisorMetric = 'impressionreach';
    
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
