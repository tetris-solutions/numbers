<?php
return [
    "metric" => "impressions",
    "entity" => "Location",
    "fields" => [
        "Impressions"
    ],
    "report" => "GEO_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'Impressions'}));
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
