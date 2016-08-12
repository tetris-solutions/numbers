<?php
return [
    "metric" => "conversionrate",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "inferred_from" => ["conversions", "clicks"],
    "fields" => [
        "ConversionRate"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace('%', '', $data->ConversionRate)) / 100;
    },
    "sum" => function (array $rows) {
        $sumConversions = 0;
        $sumClicks = 0;

        foreach ($rows as $row) {
            $sumConversions += $row->conversions;
            $sumClicks += $row->clicks;
        }

        return $sumClicks !== 0
            ? $sumConversions / $sumClicks
            : 0;
    }
];
