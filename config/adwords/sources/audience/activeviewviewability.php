<?php
return [
    "metric" => "activeviewviewability",
    "entity" => "Audience",
    "fields" => [
        "ActiveViewViewability"
    ],
    "report" => "AUDIENCE_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'ActiveViewViewability'}));
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
