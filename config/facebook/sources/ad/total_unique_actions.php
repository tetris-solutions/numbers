<?php
return [
    "metric" => "total_unique_actions",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "total_unique_actions"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->total_unique_actions);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->total_unique_actions;
            },
            0.0
        );
    }
];
