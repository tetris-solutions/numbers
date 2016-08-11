<?php
return [
    "metric" => "averagecpc",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "inferred_from" => ["clicks", "cost"],
    "fields" => [
        "AverageCpc"
    ],
    "parse" => function ($data): float {
        return (float)$data->AverageCpc;
    },
    "sum" => function (array $rows) {
        $sumClicks = 0;
        $sumCost = 0;

        foreach ($rows as $row) {
            $sumClicks += $row->clicks;
            $sumCost += $row->cost;
        }

        return $sumClicks !== 0
            ? $sumCost / $sumClicks
            : 0;
    }
];
