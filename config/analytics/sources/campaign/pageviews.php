<?php
return [
    "metric" => "pageviews",
    "entity" => "Campaign",
    "platform" => "analytics",
    "report" => "GA_DEFAULT",
    "fields" => [
        "ga:pageviews"
    ],
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
