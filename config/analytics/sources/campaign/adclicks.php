<?php
return [
    "metric" => "adclicks",
    "entity" => "Campaign",
    "fields" => [
        "ga:adClicks"
    ],
    "report" => "GA_DEFAULT",
    "platform" => "analytics",
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ga:adClicks'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'adclicks'};
            },
            0.0
        );
    }
];
