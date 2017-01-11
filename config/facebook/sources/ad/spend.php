<?php
return [
    "metric" => "spend",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "spend"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'spend'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'spend'};
            },
            0.0
        );
    }
];
