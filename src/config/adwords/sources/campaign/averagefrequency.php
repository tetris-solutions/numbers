<?php
return [
    "metric" => "averagefrequency",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "inferred_from" => ["impressions", "impressionreach"],
    "fields" => [
        "AverageFrequency"
    ],
    "parse" => function ($data): int {
        return (int)$data->AverageFrequency;
    },
    "sum" => function (array $rows) {
        $sumImpressions = 0;
        $sumImpressionsReach = 0;

        foreach ($rows as $row) {
            $sumImpressionsReach += $row->impressionreach;
            $sumImpressions += $row->impressions;
        }

        return $sumImpressionsReach !== 0
            ? $sumImpressions / $sumImpressionsReach
            : 0;
    }
];
