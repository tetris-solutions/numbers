<?php
return [
    "metric" => "deeplink_clicks",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "deeplink_clicks"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->{'deeplink_clicks'});
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'deeplink_clicks'};
            },
            0.0
        );
    }
];
