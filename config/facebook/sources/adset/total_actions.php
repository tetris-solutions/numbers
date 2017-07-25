<?php
return [
    "metric" => "total_actions",
    "entity" => "AdSet",
    "fields" => [
        "total_actions"
    ],
    "report" => "FB_ADSET",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'total_actions'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'total_actions'};
            },
            0.0
        );
    }
];
