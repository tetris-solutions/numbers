<?php
return [
    "metric" => "impressions",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "impressions"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->impressions);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->impressions;
            },
            0.0
        );
    }
];
