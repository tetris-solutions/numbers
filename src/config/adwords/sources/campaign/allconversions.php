<?php
return [
    "metric" => "allconversions",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "AllConversions"
    ],
    "parse" => function ($data): int {
        return (int)$data->AllConversions;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->allconversions;
            },
            0.0
        );
    }
];
