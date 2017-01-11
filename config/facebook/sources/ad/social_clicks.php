<?php
return [
    "metric" => "social_clicks",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "social_clicks"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'social_clicks'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'social_clicks'};
            },
            0.0
        );
    }
];
