<?php
return [
    "metric" => "engagementrate",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "inferred_from" => ["engagements", "impressions"],
    "fields" => [
        "EngagementRate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->EngagementRate)) / 100;
    },
    "sum" => function (array $rows) {
        $sumEngagements = 0;
        $sumImpressions = 0;

        foreach ($rows as $row) {
            $sumEngagements += $row->engagements;
            $sumImpressions += $row->impressions;
        }

        return $sumImpressions !== 0
            ? $sumEngagements / $sumImpressions
            : 0;
    }
];
