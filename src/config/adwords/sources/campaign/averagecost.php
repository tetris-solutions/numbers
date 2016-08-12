<?php
return [
    "metric" => "averagecost",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "inferred_from" => ["interactions", "cost"],
    "fields" => [
        "AverageCost"
    ],
    "parse" => function ($data): float {
        return (float)$data->AverageCost;
    },
    "sum" => function (array $rows) {
        $sumInteractions = 0;
        $sumCost = 0;

        foreach ($rows as $row) {
            $sumInteractions += $row->interactions;
            $sumCost += $row->cost;
        }

        return $sumInteractions !== 0
            ? $sumCost / $sumInteractions
            : 0;
    }
];
