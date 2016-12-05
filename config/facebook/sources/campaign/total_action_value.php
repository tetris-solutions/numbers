<?php
return [
    "metric" => "total_action_value",
    "entity" => "Campaign",
    "platform" => "facebook",
    "report" => "FB_CAMPAIGN",
    "fields" => [
        "total_action_value"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->total_action_value);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, \stdClass $row): float {
                return $carry + $row->total_action_value;
            },
            0.0
        );
    }
];
