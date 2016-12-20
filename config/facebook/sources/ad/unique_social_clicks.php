<?php
return [
    "metric" => "unique_social_clicks",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "unique_social_clicks"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->{'unique_social_clicks'});
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'unique_social_clicks'};
            },
            0.0
        );
    }
];
