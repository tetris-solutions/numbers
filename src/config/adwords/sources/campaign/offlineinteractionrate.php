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
        return (float)$data->OfflineInteractionRate;
    },
    "inferred_from" => [
        "numofflineinteractions",
        "numofflineimpressions"
    ],
    "sum" => function (array $rows) {
        $sumDividend = 0;
        $sumDivisor = 0;
        foreach ($rows as $row) {
            $sumDividend += $row->numofflineinteractions;
            $sumDivisor += $row->numofflineimpressions;
        }
        return (float)$sumDivisor !== 0.0
            ? $sumDividend / $sumDivisor
            : 0;
    }
];
