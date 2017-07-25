<?php
return [
    "metric" => "app_store_clicks",
    "entity" => "Ad",
    "fields" => [
        "app_store_clicks"
    ],
    "report" => "FB_AD",
    "platform" => "facebook",
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'app_store_clicks'}));
    },
    "sum" => function (array $rows) {
        return array_reduce(
            $rows,
            function (float $carry, $row): float {
                return $carry + $row->{'app_store_clicks'};
            },
            0.0
        );
    }
];
