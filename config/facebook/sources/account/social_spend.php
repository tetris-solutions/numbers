<?php
return [
    "metric" => "social_spend",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "social_spend"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->social_spend);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->social_spend;
            },
            0.0
        );
    }
];
