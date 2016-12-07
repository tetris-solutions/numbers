<?php
return [
    "metric" => "app_store_clicks",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "app_store_clicks"
    ],
    "parse" => function ($data) {
        return (float)str_replace(',', '', $data->app_store_clicks);
    },
    "sum" => function (array $rows): float {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'app_store_clicks'};
            },
            0.0
        );
    }
];
