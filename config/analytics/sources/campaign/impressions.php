<?php
return [
    "metric" => "impressions",
    "entity" => "Campaign",
    "platform" => "analytics",
    "report" => "GA_DEFAULT",
    "fields" => [
        "ga:impressions"
    ],
    "parse" => function ($data): int {
        return intval(str_replace(',', '', $data->{'ga:impressions'}));
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
