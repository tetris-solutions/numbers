<?php
return [
    "metric" => "impressions",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "impressions"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->impressions);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->impressions;
            },
            0.0
        );
    }
];
