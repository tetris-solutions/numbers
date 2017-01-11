<?php
return [
    "metric" => "total_unique_actions",
    "entity" => "AdSet",
    "platform" => "facebook",
    "report" => "FB_ADSET",
    "fields" => [
        "total_unique_actions"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'total_unique_actions'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'total_unique_actions'};
            },
            0.0
        );
    }
];
