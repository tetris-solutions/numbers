<?php
return [
    "metric" => "social_clicks",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "social_clicks"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->{'social_clicks'});
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'social_clicks'};
            },
            0.0
        );
    }
];
