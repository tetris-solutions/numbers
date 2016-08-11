<?php
return [
    "metric" => "averagecpm",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "inferred_from" => ["impressions", "cost"],
    "fields" => [
        "AverageCpm"
    ],
    "parse" => function ($data): float {
        return (float)$data->AverageCpm;
    },
    "sum" => function (array $rows) {
        $sumImpressions = 0;
        $sumCost = 0;

        foreach ($rows as $row) {
            $sumImpressions += $row->impressions;
            $sumCost += $row->cost;
        }

        return $sumImpressions !== 0
            ? ($sumCost / $sumImpressions)*1000
            : 0;
    }
];
