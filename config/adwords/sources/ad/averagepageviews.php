<?php
return [
    "metric" => "averagepageviews",
    "entity" => "Ad",
    "platform" => "adwords",
    "report" => "AD_PERFORMANCE_REPORT",
    "fields" => [
        "AveragePageviews"
    ],
    "parse" => function ($data): int {
        return (int)str_replace(',', '', $data->{'AveragePageviews'});
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'averagepageviews'};
            },
            0.0
        );
    }
];
