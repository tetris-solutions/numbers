<?php
return [
    "metric" => "activeviewmeasurability",
    "entity" => "Audience",
    "fields" => [
        "ActiveViewMeasurability"
    ],
    "report" => "AUDIENCE_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ActiveViewMeasurability'}));
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
