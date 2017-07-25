<?php
return [
    "metric" => "social_spend",
    "entity" => "Account",
    "fields" => [
        "social_spend"
    ],
    "report" => "FB_ACCOUNT",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'social_spend'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'social_spend'};
            },
            0.0
        );
    }
];
