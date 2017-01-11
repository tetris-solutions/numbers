<?php
return [
    "metric" => "offlineinteractionrate",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "OfflineInteractionRate"
    ],
    "parse" => function ($data): float {
        return (float)str_replace(',', '', $data->OfflineInteractionRate);
    },
    "inferred_from" => [
        "numofflineinteractions",
        "numofflineimpressions"
    ],
    "sum" => function (array $rows) {
        $dividendMetric = 'numofflineinteractions';
        $divisorMetric = 'numofflineimpressions';
    
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
