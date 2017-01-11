<?php
return [
    "metric" => "activeviewviewability",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "ActiveViewViewability"
    ],
    "parse" => function ($data): int {
        return (int)str_replace(',', '', $data->{'ActiveViewViewability'});
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'activeviewviewability'};
            },
            0.0
        );
    }
];
