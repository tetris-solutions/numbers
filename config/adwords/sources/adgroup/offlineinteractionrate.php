<?php
return [
    "metric" => "offlineinteractionrate",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "OfflineInteractionRate"
    ],
    "parse" => function ($data): int {
        return (int)str_replace(',', '', $data->{'OfflineInteractionRate'});
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
