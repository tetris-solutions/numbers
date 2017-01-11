<?php
return [
    "metric" => "averagepageviews",
    "entity" => "Campaign",
    "platform" => "adwords",
    "report" => "CAMPAIGN_PERFORMANCE_REPORT",
    "fields" => [
        "AveragePageviews"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'AveragePageviews'}));
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
