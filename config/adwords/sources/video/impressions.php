<?php
return [
    "metric" => "impressions",
    "entity" => "Video",
    "platform" => "adwords",
    "report" => "VIDEO_PERFORMANCE_REPORT",
    "fields" => [
        "Impressions"
    ],
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
