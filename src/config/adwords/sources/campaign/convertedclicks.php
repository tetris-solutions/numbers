<?php
return [
    "metric" => "convertedclicks",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "ConvertedClicks"
    ],
    "parse" => function ($data): int {
        return (int)$data->ConvertedClicks;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->convertedclicks;
            },
            0.0
        );
    }
];
