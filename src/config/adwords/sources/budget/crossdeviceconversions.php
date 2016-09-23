<?php
return [
    "metric" => "crossdeviceconversions",
    "entity" => "Budget",
    "platform" => "adwords",
    "report" => "BUDGET_PERFORMANCE_REPORT",
    "fields" => [
        "CrossDeviceConversions"
    ],
    "parse" => function ($data): int {
        return (int)$data->CrossDeviceConversions;
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->crossdeviceconversions;
            },
            0.0
        );
    }
];
