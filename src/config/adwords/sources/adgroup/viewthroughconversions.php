<?php
return [
    "metric" => "viewthroughconversions",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "ViewThroughConversions"
    ],
    "parse" => function ($data): int {
        return (int)$data->ViewThroughConversions;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->viewthroughconversions;
            },
            0.0
        );
    }
];
