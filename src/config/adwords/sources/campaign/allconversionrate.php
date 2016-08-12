<?php
return [
    "metric" => "allconversionrate",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "inferred_from" => ["allconversions", "clicks"],
    "fields" => [
        "AllConversionRate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->AllConversionRate)) / 100;
    },
    "sum" => function (array $rows) {
        $sumAllConversions = 0;
        $sumClicks = 0;

        foreach ($rows as $row) {
            $sumAllConversions += $row->allconversions;
            $sumClicks += $row->clicks;
        }

        return $sumClicks !== 0
            ? $sumAllConversions / $sumClicks
            : 0;
    }
];
