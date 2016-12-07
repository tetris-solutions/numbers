<?php
return [
    "metric" => "spend",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "spend"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->spend);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'spend'};
            },
            0.0
        );
    }
];
