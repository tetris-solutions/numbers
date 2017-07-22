<?php
return [
    "metric" => "activeviewimpressions",
    "entity" => "Placement",
    "fields" => [
        "ActiveViewImpressions"
    ],
    "report" => "AUTOMATIC_PLACEMENTS_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ActiveViewImpressions'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'activeviewimpressions'};
            },
            0.0
        );
    }
];
