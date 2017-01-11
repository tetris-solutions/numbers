<?php
return [
    "metric" => "conversions",
    "entity" => "Audience",
    "platform" => "adwords",
    "report" => "AUDIENCE_PERFORMANCE_REPORT",
    "fields" => [
        "Conversions"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'Conversions'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'conversions'};
            },
            0.0
        );
    }
];
