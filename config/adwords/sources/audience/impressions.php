<?php
return [
    "metric" => "impressions",
    "entity" => "Audience",
    "platform" => "adwords",
    "report" => "AUDIENCE_PERFORMANCE_REPORT",
    "fields" => [
        "Impressions"
    ],
    "parse" => function ($data): int {
        return (int)str_replace(',', '', $data->{'Impressions'});
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'impressions'};
            },
            0.0
        );
    }
];
