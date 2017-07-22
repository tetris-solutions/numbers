<?php
return [
    "metric" => "videoviews",
    "entity" => "Account",
    "fields" => [
        "VideoViews"
    ],
    "report" => "ACCOUNT_PERFORMANCE_REPORT",
    "platform" => "adwords",
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'VideoViews'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'videoviews'};
            },
            0.0
        );
    }
];
