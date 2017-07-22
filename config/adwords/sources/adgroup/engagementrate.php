<?php
return [
    "metric" => "engagementrate",
    "entity" => "AdGroup",
    "fields" => [
        "EngagementRate"
    ],
    "inferred_from" => [
        "engagements",
        "impressions"
    ],
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        $valueAsNumericString = str_replace(['%', ','], '', $data->{'EngagementRate'});
    
        return floatval($valueAsNumericString) / 100;
    },
    "sum" => function (array $rows) {
        $dividendMetric = 'engagements';
        $divisorMetric = 'impressions';
    
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
