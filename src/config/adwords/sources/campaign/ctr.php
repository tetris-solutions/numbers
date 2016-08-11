<?php
return [
    "metric" => "ctr",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "inferred_from" => ["clicks", "impressions"],
    "fields" => [
        "Ctr"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->Ctr)) / 100;
    },
    "sum" => function (array $rows) {
        $sumClicks = 0;
        $sumImpressions = 0;

        foreach ($rows as $row) {
            $sumClicks += $row->clicks;
            $sumImpressions += $row->impressions;
        }

        return $sumImpressions !== 0
            ? $sumClicks / $sumImpressions
            : 0;
    }
];
