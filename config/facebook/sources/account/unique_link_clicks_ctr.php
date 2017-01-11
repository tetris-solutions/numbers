<?php
return [
    "metric" => "unique_link_clicks_ctr",
    "entity" => "Account",
    "platform" => "facebook",
    "report" => "FB_ACCOUNT",
    "fields" => [
        "unique_link_clicks_ctr"
    ],
    "parse" => function ($data): float {
        return floatval(str_replace(',', '', $data->{'unique_link_clicks_ctr'}));
    },
    "sum" => NULL
];
