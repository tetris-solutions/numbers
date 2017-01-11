<?php
return [
    "metric" => "impressions",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "impressions"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'impressions'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'impressions'};
            },
            0.0
        );
    }
];
