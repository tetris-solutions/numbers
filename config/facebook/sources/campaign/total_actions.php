<?php
return [
    "metric" => "total_actions",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "total_actions"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->total_actions);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->total_actions;
            },
            0.0
        );
    }
];
