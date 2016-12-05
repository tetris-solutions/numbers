<?php
return [
    "metric" => "unique_impressions",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "unique_impressions"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->unique_impressions);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->unique_impressions;
            },
            0.0
        );
    }
];
