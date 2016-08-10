<?php
return [
    "metric" => "averagefrequency",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "AverageFrequency"
    ],
    "parse" => function ($data): int {
        return (int)$data->AverageFrequency;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->averagefrequency;
            },
            0.0
        );
    }
];
