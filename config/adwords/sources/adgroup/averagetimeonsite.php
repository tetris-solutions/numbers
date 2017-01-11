<?php
return [
    "metric" => "averagetimeonsite",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "AverageTimeOnSite"
    ],
    "parse" => function ($data): int {
        return (int)str_replace(',', '', $data->{'AverageTimeOnSite'});
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'averagetimeonsite'};
            },
            0.0
        );
    }
];
