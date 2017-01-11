<?php
return [
    "metric" => "unique_link_clicks_ctr",
    "entity" => "Ad",
    "platform" => "facebook",
    "report" => "FB_AD",
    "fields" => [
        "unique_link_clicks_ctr"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'unique_link_clicks_ctr'}));
    },
    "sum" => NULL
];
