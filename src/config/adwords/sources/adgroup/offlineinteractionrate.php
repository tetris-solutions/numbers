<?php
return [
    "metric" => "offlineinteractionrate",
    "entity" => "Adgroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "OfflineInteractionRate"
    ],
    "parse" => function ($data): int {
        return (int)$data->OfflineInteractionRate;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->offlineinteractionrate;
            },
            0.0
        );
    }
];
