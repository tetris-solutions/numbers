<?php
return [
    "metric" => "pageviews",
    "entity" => "Campaign",
    "fields" => [
        "ga:pageviews"
    ],
    "report" => "GA_DEFAULT",
    "platform" => "analytics",
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ga:pageviews'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'pageviews'};
            },
            0.0
        );
    }
];
