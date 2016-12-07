<?php
return [
    "metric" => "social_spend",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "social_spend"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->social_spend);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'social_spend'};
            },
            0.0
        );
    }
];
