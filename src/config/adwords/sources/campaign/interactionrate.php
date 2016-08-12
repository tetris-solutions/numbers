<?php
return [
    "metric" => "interactionrate",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "inferred_from" => ["interactions", "impressions"],
    "fields" => [
        "InteractionRate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->InteractionRate)) / 100;
    },
    "sum" => function (array $rows) {
        $sumInteractions = 0;
        $sumImpressions = 0;

        foreach ($rows as $row) {
            $sumInteractions += $row->interactions;
            $sumImpressions += $row->impressions;
        }

        return $sumImpressions !== 0
            ? $sumInteractions / $sumImpressions
            : 0;
    }
];
