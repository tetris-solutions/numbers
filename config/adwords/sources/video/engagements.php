<?php
return [
    "metric" => "engagements",
    "entity" => "Video",
    "platform" => "adwords",
    "report" => "VIDEO_PERFORMANCE_REPORT",
    "fields" => [
        "Engagements"
    ],
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'Engagements'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'engagements'};
            },
            0.0
        );
    }
];
