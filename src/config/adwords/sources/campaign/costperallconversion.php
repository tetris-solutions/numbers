<?php
return [
    "metric" => "costperallconversion",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "inferred_from" => ["allconversions", "cost"],
    "fields" => [
        "CostPerAllConversion"
    ],
    "parse" => function ($data): float {
        return (float)$data->CostPerAllConversion;
    },
    "sum" => function (array $rows) {
        $sumAllConversions = 0;
        $sumCost = 0;

        foreach ($rows as $row) {
            $sumAllConversions += $row->allconversions;
            $sumCost += $row->cost;
        }

        return $sumAllConversions !== 0
            ? $sumCost / $sumAllConversions
            : 0;
    }
];
