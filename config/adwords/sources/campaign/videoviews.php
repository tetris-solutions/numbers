<?php
return [
    "metric" => "videoviews",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "VideoViews"
    ],
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
