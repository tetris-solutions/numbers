<?php
return [
    "metric" => "numofflineimpressions",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "NumOfflineImpressions"
    ],
    "parse" => function ($data): int {
        return (int)str_replace(',', '', $data->NumOfflineImpressions);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->numofflineimpressions;
            },
            0.0
        );
    }
];
