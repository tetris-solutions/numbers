<?php
return [
    "metric" => "costperconversion",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "inferred_from" => ["conversions", "cost"],
    "fields" => [
        "CostPerConversion"
    ],
    "parse" => function ($data): float {
        return (float)$data->CostPerConversion;
    },
    "sum" => function (array $rows) {
        $sumConversions = 0;
        $sumCost = 0;

        foreach ($rows as $row) {
            $sumConversions += $row->conversions;
            $sumCost += $row->cost;
        }

        return $sumConversions !== 0
            ? $sumCost / $sumConversions
            : 0;
    }
];
