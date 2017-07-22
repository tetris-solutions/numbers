<?php
return [
    "metric" => "offlineinteractionrate",
    "entity" => "AdGroup",
    "fields" => [
        "OfflineInteractionRate"
    ],
    "inferred_from" => [
        "numofflineinteractions",
        "numofflineimpressions"
    ],
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'OfflineInteractionRate'}));
    },
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
