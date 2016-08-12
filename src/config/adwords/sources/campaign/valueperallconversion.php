<?php
return [
    "metric" => "valueperallconversion",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "inferred_from" => ["allconversionvalue", "allconversions"],
    "fields" => [
        "ValuePerAllConversion"
    ],
    "parse" => function ($data): int {
        return (int)$data->ValuePerAllConversion;
    },
    "sum" => function (array $rows) {
        $sumAllConversions = 0;
        $sumAllConversionsValue = 0;

        foreach ($rows as $row) {
            $sumAllConversions += $row->conversions;
            $sumAllConversionsValue += $row->allconversionvalue;
        }

        return $sumAllConversions !== 0
            ? $sumAllConversionsValue / $sumAllConversions
            : 0;
    }
];
