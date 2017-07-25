<?php
return [
    "metric" => "total_action_value",
    "entity" => "Account",
    "fields" => [
        "total_action_value"
    ],
    "report" => "FB_ACCOUNT",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'total_action_value'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'total_action_value'};
            },
            0.0
        );
    }
];
