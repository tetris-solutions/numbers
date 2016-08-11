<?php
return [
    "metric" => "averagecpe",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "inferred_from" => ["engagements", "cost"],
    "fields" => [
        "AverageCpe"
    ],
    "parse" => function ($data): int {
        return (int)$data->AverageCpe;
    },
    "sum" => function (array $rows) {
        $sumEngagements = 0;
        $sumCost = 0;

        foreach ($rows as $row) {
            $sumEngagements += $row->engagements;
            $sumCost += $row->cost;
        }

        return $sumEngagements !== 0
            ? $sumCost / $sumEngagements
            : 0;
    }
];
