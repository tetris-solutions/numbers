<?php
return [
    "metric" => "numofflineinteractions",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "NumOfflineInteractions"
    ],
    "parse" => function ($data): int {
        return (int)str_replace(',', '', $data->NumOfflineInteractions);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->numofflineinteractions;
            },
            0.0
        );
    }
];
