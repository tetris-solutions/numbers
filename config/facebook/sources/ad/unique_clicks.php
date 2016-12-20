<?php
return [
    "metric" => "unique_clicks",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "unique_clicks"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->{'unique_clicks'});
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'unique_clicks'};
            },
            0.0
        );
    }
];
