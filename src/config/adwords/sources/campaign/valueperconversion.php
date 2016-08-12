<?php
return [
    "metric" => "valueperconversion",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "inferred_from" => ["conversionvalue", "conversions"],
    "fields" => [
        "ValuePerConversion"
    ],
    "parse" => function ($data): int {
        return (int)$data->ValuePerConversion;
    },
    "sum" => function (array $rows) {
        $sumConversions = 0;
        $sumConversionsValue = 0;

        foreach ($rows as $row) {
            $sumConversions += $row->conversions;
            $sumConversionsValue += $row->conversionvalue;
        }

        return $sumConversions !== 0
            ? $sumConversionsValue / $sumConversions
            : 0;
    }
];
