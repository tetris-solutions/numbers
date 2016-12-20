<?php
return [
    "metric" => "clicks",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "clicks"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->{'clicks'});
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'clicks'};
            },
            0.0
        );
    }
];
