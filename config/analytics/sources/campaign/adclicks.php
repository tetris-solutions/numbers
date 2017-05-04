<?php
return [
    "metric" => "adclicks",
    "entity" => "Campaign",
    "platform" => "analytics",
    "report" => "GA_DEFAULT",
    "fields" => [
        "ga:adClicks"
    ],
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
