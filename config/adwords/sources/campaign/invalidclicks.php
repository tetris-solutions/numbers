<?php
return [
    "metric" => "invalidclicks",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "InvalidClicks"
    ],
    "parse" => function ($data): int {
        return (int)str_replace(',', '', $data->InvalidClicks);
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'invalidclicks'};
            },
            0.0
        );
    }
];
