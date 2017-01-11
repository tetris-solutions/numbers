<?php
return [
    "metric" => "activeviewmeasurability",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewMeasurability"
    ],
    "parse" => function ($data): int {
        return (int)str_replace(',', '', $data->{'ActiveViewMeasurability'});
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'activeviewmeasurability'};
            },
            0.0
        );
    }
];
