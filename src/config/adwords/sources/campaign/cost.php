<?php
return [
    "metric" => "cost",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "Cost"
    ],
    "parse" => function ($data): float {
        return (float)$data->Cost;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->cost;
            },
            0.0
        );
    }
];
