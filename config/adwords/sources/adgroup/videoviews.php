<?php
return [
    "metric" => "videoviews",
    "entity" => "AdGroup",
    "platform" => "adwords",
    "report" => "ADGROUP_PERFORMANCE_REPORT",
    "fields" => [
        "VideoViews"
    ],
    "parse" => function ($data): int {
        return (int)str_replace(',', '', $data->VideoViews);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->videoviews;
            },
            0.0
        );
    }
];
