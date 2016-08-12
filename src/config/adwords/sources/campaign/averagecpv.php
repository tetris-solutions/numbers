<?php
return [
    "metric" => "averagecpv",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "inferred_from" => ["videoviews", "cost"],
    "fields" => [
        "AverageCpv"
    ],
    "parse" => function ($data): int {
        return (int)$data->AverageCpv;
    },
    "sum" => function (array $rows) {
        $sumVideoViews = 0;
        $sumCost = 0;

        foreach ($rows as $row) {
            $sumVideoViews += $row->videoviews;
            $sumCost += $row->cost;
        }

        return $sumVideoViews !== 0
            ? $sumCost / $sumVideoViews
            : 0;
    }
];
