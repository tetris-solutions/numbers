<?php
return [
    "metric" => "offlineinteractionrate",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
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
        return $sumDivisor !== 0
            ? $sumDividend / $sumDivisor
            : 0;
    }
];
