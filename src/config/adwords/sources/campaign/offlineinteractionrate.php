<?php
return [
    "metric" => "offlineinteractionrate",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "inferred_from" => ["numofflineimpressions", "numofflineinteractions"],
    "fields" => [
        "OfflineInteractionRate"
    ],
    "parse" => function ($data): int {
        return (int)$data->OfflineInteractionRate;
    },
    "sum" => function (array $rows) {
        $sumNumofflineinteractions = 0;
        $sumNumofflineimpressions = 0;

        foreach ($rows as $row) {
            $sumNumofflineinteractions += $row->numofflineinteractions;
            $sumNumofflineimpressions += $row->numofflineimpressions;
        }

        return $sumNumofflineimpressions !== 0
            ? $sumNumofflineinteractions / $sumNumofflineimpressions
            : 0;
    }
];
