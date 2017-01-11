<?php
return [
    "metric" => "relativectr",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "RelativeCtr"
    ],
    "parse" => function ($data): int {
        return (int)str_replace(',', '', $data->{'RelativeCtr'});
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'relativectr'};
            },
            0.0
        );
    }
];
